<?php

namespace App\Repositories;

use App\Http\Resources\V1\BeneficiaryCollection;
use App\Http\Resources\V1\BeneficiaryResource;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Auth;

class BeneficiarieRepository
{

    use FunctionGeneralTrait, UserDataTrait;

    private $model;

    function __construct()
    {
        $this->model = new Beneficiary();
    }

    public function getAll()
    {
        $beneficiaries = new BeneficiaryCollection($this->model->orderBy('id', 'DESC')->get());
        return $beneficiaries;
    }

    public function create($request)
    {
        $request['created_by'] = Auth::id();
        $beneficiarie = Beneficiary::create($request);
        $beneficiarie->save();
        /* GUARDAMOS EN CONTROL DATA */
        $this->control_data($beneficiarie, 'store');
        $result = new BeneficiaryResource($beneficiarie);
        return $result;
    }

    public function findById($id)
    {
        $beneficiarie = $this->model->findOrFail($id);
        $result = new BeneficiaryResource($beneficiarie);
        return $result;
    }

    public function update($data, $id)
    {
        $beneficiarie = $this->model->findOrFail($id);
        $beneficiarie->update($data);
        /* GUARDAMOS EN CONTROL DATA */
        $this->control_data($beneficiarie, 'update');
        $result = new BeneficiaryResource($beneficiarie);
        return $result;
    }

    public function delete($id)
    {
        $beneficiarie = $this->model->findOrFail($id);
        $beneficiarie->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

    public function getValidate($data, $method){

        $validate = [
            'affiliation_type'=> 'bail|required',
            /* 'group_id' => 'bail|required',
            'full_name' => 'bail|required',
            'institution_entity_referred' => 'bail|required',
            'accept' => 'bail|required',
            'linkage_project' => 'bail|required',
            'participant_type' => 'bail|required',
            'type_document' => 'bail|required',
            'document_number' => 'bail|required',
            'zone' => 'bail|required',
            'stratum' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|required',
            'file' => 'bail|required',
            'status' => 'bail|required',
            'audited' => 'bail|required',
            'rejection_message' => 'bail|required',
            'referrer_name' => 'bail|required', */
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'affiliation_type'=> 'Tipo de afiliaciín',
            /* 'group_id' => 'bail|required',
            'full_name' => 'bail|required',
            'institution_entity_referred' => 'bail|required',
            'accept' => 'bail|required',
            'linkage_project' => 'bail|required',
            'participant_type' => 'bail|required',
            'type_document' => 'bail|required',
            'document_number' => 'bail|required',
            'zone' => 'bail|required',
            'stratum' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|required',
            'file' => 'bail|required',
            'status' => 'bail|required',
            'audited' => 'bail|required',
            'rejection_message' => 'bail|required',
            'referrer_name' => 'bail|required', */
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }

}
