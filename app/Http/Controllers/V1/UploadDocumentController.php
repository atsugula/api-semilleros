<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\UploadDocumentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UploadDocumentController extends Controller
{
    private $repository;

    function __construct(UploadDocumentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function upload(Request $request)
    {
        // // Gate::authorize('haveaccess');
        try {
            DB::beginTransaction();

            $response = $this->repository->upload($request);

            DB::commit();

            return $response;
        } catch (\Throwable $ex) {
            return $this->createErrorResponse([], 'Algo salio mal al subir el documento' . $ex->getMessage() . ' linea ' . $ex->getCode());
        }
    }
}
