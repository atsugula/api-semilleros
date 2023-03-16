<?php

namespace App\Repositories;

use App\Events\ContractCancellation;
use App\Events\ContractManagement;
use App\Models\Contract;
use App\Models\Contractor;
use App\Models\Status;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class ContractRepository
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $data = Contract::with('contractor', 'hiring', 'status', 'clauses', 'transcriber', 'reviewer', 'approver')->whereNotNull('cap_date')->get();
        return $data;
    }

    public function create($request)
    {
        /* CREAMOS EL CONTRACTOR */
        $contractor = Contractor::create($request);
        /* FINALMENTE GUARDAMOS LA RELACION */
        $contract = Contract::create([
            'contractor_id' => $contractor->id,
            'hiring_id' => 1,
            'scanning_pdf' => null,
            'clausula_id' => 1,
        ]);
        /* GUARDAMOS EL CONTROL DE LA INFORMACION */
        $this->control_data($contract, 'store');
        $this->control_data($contractor, 'store');
        $results = $contractor;
        return $results;
    }

    public function findById($id)
    {
        $contract = Contract::findOrFail($id);
        //$result = new Con($contractor);
        return $contract;
    }

    public function update($data, $id)
    {
        /* EDITAMOS EL CONTRACTOR */
        $contractor = Contractor::findOrFail($id);
        $contractor->update($data);
        /* FINALMENTE GUARDAMOS LA RELACION */
        $contract = Contract::where('contractor_id', '=', $contractor->id)->first();
        // De momento no esta para actualizar algo concreto
        $contract->scanning_pdf = 'prueba2222.pdf';
        $contract->save();
        /* GUARDAMOS EL CONTROL DE LA INFORMACIO */
        $this->control_data($contractor, 'update');
        $this->control_data($contract, 'update');
        $result = $contract;
        return $result;
    }

    public function delete($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

    public function management($request)
    {
        $status = Status::query()->where('id', $request->status)->get()->first();

        /**
         * Actualizamos el estado y el nro. identificador del contrato
         */
        $contract = Contract::query()->where('id', $request->contractor_id)->get()->first();

        if ($status->slug == 'REC') {
            $contract->update([
                'status' => $status->id,
                'rejection_message' => $request->rejection_message,
            ]);
            if (isset($request->rejections)) {
                $contract->update([
                    'rejections' => $request->rejections,
                ]);
            }
        }
        else if ($status->slug == 'APR') {
            $contract->update([
                'status' => $status->id,
                'identifier_number' => $request->identifier_number,
                'rejection_message' => NULL,
            ]);
            if (isset($request->identifier_number)) {
                $contract->update([
                    'identifier_number' => $request->identifier_number,
                ]);
            }
        }
        else if ($status->slug == 'ARC') {
            $contract->update([
                'status' => $status->id,
            ]);
        }
        $contract->save();

        //~~ SE COLOCA AL CONTRATISTA EN REVISION
        ContractManagement::dispatch($contract);
        return $contract;
    }

    public function cancellation($request)
    {
        $status = Status::query()->where('slug', 'NUL')->get()->first();

        /**
         * Actualizamos el estado y el nro. identificador del contrato
         */
        $contract = Contract::query()->where('id', $request->contractor_id)->get()->first();

        $contract->update([
            'status' => $status->id,
            'rejection_message' => $request->rejection_message,
        ]);

        $contract->save();

        //~~ SE COLOCA AL CONTRATISTA EN REVISION
        ContractCancellation::dispatch($contract);
        return $contract;
    }
}
