<?php

namespace App\Repositories;

use App\Http\Resources\V1\ContractorCollection;
use App\Http\Resources\V1\ContractorResource;
use App\Interfaces\ContractorRepositoryInterface;
use App\Models\Contract;
use App\Models\Contractor;
use App\Models\Document;
use App\Models\Status;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class ContractorRepository implements ContractorRepositoryInterface
{

    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $data = Contractor::with('infoContractor', 'validator_periods', 'contract', 'department', 'municipality', 'status')->get();
        return $data;
    }

    public function create($request)
    {
        $in_process_status = Status::query()->where('slug', 'ENP')->get()->first();

        //~~ CREAMOS EL CONTRATISTA
        $contractor = Contractor::create($request);
        $contractor->status = $in_process_status->id;
        $contractor->save();

        //~~ CREAMOS SU CONTRATO
        $contract = Contract::create([
            'contractor_id' => $contractor->id,
            'hiring_id' => 1,
            'scanning_pdf' => null,
        ]);

        /* GUARDAMOS EL CONTROL DE LA INFORMACION */
        $this->control_data($contract, 'store');
        $this->control_data($contractor, 'store');
        $results = $contractor;
        return $results;
    }

    public function findById($id)
    {
        $contractor = Contractor::query()->findOrFail($id)->load(['bank_data', 'account_type', 'contract']);
        $result = new ContractorResource($contractor);
        return $result;
    }

    public function update($data, $id)
    {
        $contractor = Contractor::findOrFail($id);
        $contractor->update($data);
        $this->control_data($contractor, 'update');
        $result = new Contractor($contractor);
        return $result;
    }

    public function delete($id)
    {
        $contractor = Contractor::findOrFail($id);
        $contractor->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

    public function revised()
    {
        // $data = Contractor::with('documents')->get();
        // $data->documents;

        // $data = Document::where('status_id', 1)->groupBy('contractor_id')->selectRaw('contractor_id, count(*) as total')->get();
        $data = Contractor::withCount(['documents' => function ($query) {
            $query->where('status_id', 1);
        }])->get();

        return $data;
    }

    public function clever()
    {
        $data = Contractor::with('status')->withCount(['documents' => function ($query) {
            $query->where('status_id', 1);
        }])->having('documents_count', 21)->get();

        return $data;
    }

    /*  public function updateState()
    {
        $contractors =  Contractor::withCount(['documents' => function ($query) {
            $query->where('status_id', 1);
        }])->get();

        foreach ($contractors as $contractor) {
            if ($contractor->documents_count < 21) {
                $contractor->status = 5;
            } elseif ($contractor->documents_count == 21) {
                $contractor->status = 2;
            } else {
                $approved_documents = Document::where([
                    ['contractor_id', $contractor->id],
                    ['status', 1]
                ])->count();
                if ($approved_documents == 21) {
                    $contractor->status = 1;
                } else {
                    $contractor->status = 4;
                }
            }
            $contractor->save();
        }
    }*/
}
