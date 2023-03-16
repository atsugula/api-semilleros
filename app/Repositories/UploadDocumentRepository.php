<?php

namespace App\Repositories;

use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Status;
use App\Events\DocumentUpload;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class UploadDocumentRepository
{
    use FunctionGeneralTrait, UserDataTrait, ImageTrait;

    public function upload(Request $request)
    {
        $doc_name = $request['doc_name'];
        $contractor = $request['contractor_id'];
        $doc_query = Document::query()->where(['contractor_id' => $contractor, 'name' => $doc_name]);
        
        if ($doc_query->exists()) {
            $this->deleteHandle($doc_query->get(['path'])->first()->path);
            $doc_query->delete();
        }

        $status_id = Status::query()->where('slug', 'ING')->get()->first()->id;

        $document = Document::create([
            'name' => $doc_name,
            'contractor_id' => $contractor,
        ]);

        $response = $this->uploadHandle($request, $doc_name, $contractor);

        if ($response['success']) {
            // Se actualiza el path del documento
            $document->update(['path' => $response['path']]);
            // Se actualiza el estado del documento
            $document->update(['status_id' => $status_id]);
        }

        DocumentUpload::dispatch($document);
        /* GUARDAMOS EL CONTROL DE LA INFORMACION */
        $this->control_data($document, 'store');

        return response()->json($document->path);
    }
}
