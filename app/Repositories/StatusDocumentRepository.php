<?php

namespace  App\Repositories;

use App\Interfaces\StatusDocumentRepositoryInterface;
use App\Models\Document;
use App\Models\Status;
use App\Models\StatusDocument;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class StatusDocumentRepository implements StatusDocumentRepositoryInterface
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $results = StatusDocument::all();
        return $results;
    }

    public function create($request)
    {
        $status = StatusDocument::create($request);
        $this->control_data($status, 'store');
        $results = new StatusDocument($status);
        return $results;
    }

    public function findById($id)
    {
        $status = StatusDocument::findOrFail($id);
        return $status;
    }

    public function update($data, $id)
    {

        $status = StatusDocument::findOrFail($id);
        $status->update($data);
        $this->control_data($status, 'update');
        $result = new StatusDocument($status);
        return $result;
    }

    public function delete($id)
    {
        $status = StatusDocument::findOrFail($id);
        $status->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

    public function updateMasive($data)
    {
        foreach ($data['data'] as $item) {
            $doc = Document::findOrFail($item['document_id']);
            $doc->status_id = $item['status_id'];
            $doc->save();
        }

        return response()->json(['message' => 'La actualización masiva se realizó correctamente'], 200);
    }
}
