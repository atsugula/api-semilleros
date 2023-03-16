<?php

namespace App\Repositories;

use App\Http\Resources\V1\ValidityPeriodCollection;
use App\Http\Resources\V1\ValidityPeriodResource;
use App\Traits\FunctionGeneralTrait;
use App\Models\Validity_period;

class ValidityPeriodRepository
{

    private $model;
    function __construct()
    {
        $this->model = new Validity_period();
    }

    use FunctionGeneralTrait;

    public function getAll()
    {
        $validate_period = new ValidityPeriodCollection($this->model->orderBy('id', 'DESC')->get());
        return $validate_period;
    }
    public function create($request)
    {
        $validate_period = $this->model->create($request);
        // Guardamos en dataModel
        $this->control_data($validate_period, 'store');
        $results = new ValidityPeriodResource($validate_period);
        return $results;
    }

    public function findById($id)
    {
        $validate_period = $this->model->findOrFail($id);
        $result = new ValidityPeriodResource($validate_period);
        return $result;
    }

    public function update($data)
    {
        $validate_period = $this->model->findOrFail($data['id']);
        $validate_period->update($data);
        // Guardamos en dataModel
        $this->control_data($validate_period, 'update');
        $result = new ValidityPeriodResource($validate_period);
        return $result;
    }

    public function delete($id)
    {
        $validate_period = $this->model->findOrFail($id);
        $validate_period->delete();
        return response()->json(['items' => 'El periodo de vigencia fue eliminado correctamente.']);
    }

    public function getValidate($data, $method){

        $validate = [
            'consecutive' => $method != 'update' ? 'bail|required|string|max:190' : 'bail',
            'term' => 'bail|required|string|max:190',
            'start_date' => 'bail|required',
            'final_date' => 'bail|required',
            'cap_date' => 'bail|required',
            'cap' => 'bail|required|string|max:190',
            'cap_certificate' => 'bail|required|string|max:190',
        ];

        $messages = [
            'required' => ':attribute es obligatorio.',
            'max' => ':attribute es muy grande.',
        ];

        $attrs = [
            'consecutive' => 'Consecutivo',
            'term' => 'Plazo',
            'start_date' => 'Fecha inicio',
            'final_date' => 'Fecha final',
            'cap_date' => 'Fecha cap',
            'cap' => 'Apropiación presupuestal',
            'cap_certificate' => 'Certificación presupuestal',
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }

}
