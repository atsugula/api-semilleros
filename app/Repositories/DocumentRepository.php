<?php

namespace App\Repositories;

use App\Events\DocumentManagement;
use App\Events\DocumentUpload;
use App\Models\Contractor;
use App\Models\Document;
use App\Traits\FunctionGeneralTrait;
use App\Traits\ImageTrait;
use App\Traits\UserDataTrait;

class DocumentRepository
{
    use FunctionGeneralTrait, UserDataTrait, ImageTrait;

    public function getAll()
    {
        $data = Document::with('status')->get();
        return $data;
    }

    public function getAllDocuments($id)
    {
        $data = Document::where('user_id', $id)->count(); //Modificar por colleccion
        return $data + 1;
    }

    public function create($request)
    {
        /* VARIABLES A USAR */
        $doc_name = $request['doc_name'];
        $contractor = $request['contractor_id'];
        // $num = $this->getAllDocuments($request['user_id']);
        // $doc = 'doc';
        // $contract = $request['contract_id'];
        // $contractor = $request['contractor_id'];
        /* CREAMOS EL DOCUMENTO SIN EL PATH */
        $document = Document::create([
            'name' => $doc_name,
            'contractor_id' => $contractor,
        ]);
        /* SUBIR DOCUMENTOS UNO POR UNO */
        $response = $this->uploadHandle($request, $doc_name, $contractor);

        if ($response['success']) {
            // ACA SE ACTUALIZA O CREA LA FILA EN LA TABLA Y SEGUIDO EL PATH DEL DOCUMENTO
            // return response()->json(['doc_path' => $response['path']]);
            $document->update(['path' => $response['path']]);
        }

        /* GUARDAMOS EL CONTROL DE LA INFORMACION */
        $this->control_data($document, 'store');

        return response()->json(['message' => 'Archivos subidos correctamente']);
    }

    public function findById($id)
    {
        $document = Document::with('status')->where('contractor_id', $id)->get();
        return  $document;
    }

    public function update($request, $id)
    {
        /* VARIABLES A USAR */
        $doc = 'doc';
        $contract = $request['contract_id'];
        $contractor = $request['contractor_id'];

        /* SOLO PUEDE GUARDAR EL DOCUMENTO */
        $document = Document::findOrFail($id);
        /* SI HAY ARCHIVO SUBIR DOCUMENTO */
        if ($request->hasFile('doc')) {
            $response = $this->uploadHandle($request, $doc, $contractor, $contract);
            if ($response['success']) {
                // ACA SE ACTUALIZA O CREA LA FILA EN LA TABLA Y SEGUIDO EL PATH DEL DOCUMENTO
                // return response()->json(['doc_path' => $response['path']]);
                $document->update(['path' => $response['path']]);
            }
        }

        /* GUARDAMOS EL CONTROL DE LA INFORMACION */
        $this->control_data($document, 'update');

        // $result = new Contractor($document);
        return response()->json(['message' => 'Archivos editados correctamente']);
    }

    public function management($request)
    {
        $data = $request->all()['data'];

        foreach ($data as $key => $item) {
            $doc = Document::findOrFail($item['document_id']);
            $doc->status_id = $item['status_id'];
            $doc->save();

            // EJECUTAR EVENTO DE ESTADOS DE CONTRATISTA EN LA ULTIMA ITERACION
            if ($key === array_key_last($data)) {
                DocumentManagement::dispatch($doc, $request->all()['reject_note']);
            }
        }

        return response()->json(['message' => 'Gestión exitosa']);
    }

    public function delete($request)
    {
        $doc_query = Document::query()->where('path', $request->input('path'))->get()->first();
        
        if ($doc_query->exists()) {
            $this->deleteHandle($doc_query->path);
            
            $doc_query->delete();
        }

        $deleted = Document::onlyTrashed()->where('path', $request->input('path'))->get()->first();
        DocumentUpload::dispatch($deleted);

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }
    /* FUNCION PARA CAMBIAR EL ESTADO DEL CONTRATISTA
        CUANDO SE SUBAN TODOS LOS DOCUMENTOS */
    public function approved($id){
        $contract = Contractor::findOrFail($id);
        $docs = Document::where('contractor_id','=',$contract->id)->count();
        if ($docs >= 20){
            // $contract->state = 'APROBADO'
            return true;
        }
    }

}
