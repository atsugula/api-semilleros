<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use App\Models\InfoContractor;
use App\Traits\FunctionGeneralTrait;

class InfoContractorsRepository implements CrudRepositoryInterface
{
    public function getAll()
    {
        $data = InfoContractor::with('contractor')->get();
        return $data;
    }

    use FunctionGeneralTrait;

    public function create($request)
    {
        $data = InfoContractor::where('contractor_id', $request['contractor_id'])->first();

        if ($data !== null) {
            return response()->json(['error' => 'Ya la información de este contratista se diligenció']);
        }

        $infoContractor = InfoContractor::create($request);
        return $infoContractor;
    }

    public function findById($id)
    {
        $infoContractor = InfoContractor::findOrFail($id)->with('contractor')->get();
        return $infoContractor;
    }

    public function update($data, $id)
    {
        $infoContractor = InfoContractor::findOrFail($id);
        $infoContractor->update($data);

        return $infoContractor;
    }

    public function delete($id)
    {
        $infoContractor = InfoContractor::findOrFail($id);
        $infoContractor->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

    public function getValidate($data, $method)
    {

        $validate = [
            'pension' => 'bail|required',
            'arl' => 'bail|required',
            'eps' => 'bail|required',
            'history' => 'bail|required',
            'activities' => 'bail|required',
            'experience_profile' => 'bail|required',
            'mobilizations_value' => 'bail|required',
            'mobilizations_transport' => 'bail|required',
            'quota_without_mobilization' => 'bail|required',
            'payroll' => 'bail|required',
            'budget_allocation' => 'bail|required',
            // 'contractual_object' => 'bail|required'
            // 'start_date' => 'bail|required',
            //  'final_date' => 'bail|required',
            // 'number_share' => 'bail|required',
            // 'contract_value' => 'bail|required',
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'pension' => 'Pension',
            'arl' => 'Arl',
            'eps' => 'Eps',
            'history' => 'Nuevo o Venia',
            'activities' => 'Actividades',
            'experience_profile' => 'Experiencia',
            'mobilizations_value' => 'Valor cuota de movilización',
            'mobilizations_transport' => 'Movilización y Transporte',
            'quota_without_mobilization' => 'Valor cuota sin movilización',
            'payroll' => 'Nomina de sueldo',
            'budget_allocation' => 'Asignación presupuestal',
            //   'contractual_object' => 'bail|required',
            //    'start_date' => 'bail|required',
            //    'final_date' => 'bail|required',
            //'number_share' => 'Numero de cuotas',
            // 'contract_value' => 'bail|required',

        ];

        return $this->validator($data, $validate, $messages, $attrs);
    }
}
