<?php

namespace App\Http\Utilities\Validates;

use App\Traits\FunctionGeneralTrait;

class ContractorValidates
{
    use FunctionGeneralTrait;
    public function validates($data)
    {
        $validate = [
            'identification' => 'unique:contractors,identification',
            'email' => 'unique:contractors,email',
            'phone' => 'unique:contractors,phone',
            'rut' => 'unique:contractors,rut',
           // 'contract_value' => 'required|integer',
           // 'validity_periods_id' => 'required|integer',
            //'bank' => 'required',
        ];

        $messages = [
            'identification.unique' => 'El campo :attribute ya existe',
            'email.unique' => 'El campo :attribute ya existe',
            'phone.unique' => 'El campo :attribute ya existe',
            'rut.unique' => 'El campo :attribute ya existe',
           // 'contract_value.required' => 'El campo :attribute es obligatorio',
           // 'contract_value.integer' => 'El campo :attribute debe ser un numero entero',
            //'validity_periods_id.required' => 'El campo :attribute es obligatorio',
            //'validity_periods_id.integer' => 'El campo :attribute debe ser un numero entero',
           // 'bank.required' => 'El campo :attribute es obligatorio',
        ];

        $attrs = [
            'identification' => 'Identificacion',
            'email' => 'Correo',
            'phone' => 'Telefono',
            'rut' => 'Rut',
           /* 'contract_value' => 'Valor del contrato',
            'budget_allocation' => 'Asignación de presupuesto',
            'bank' => 'Banco',*/
        ];

        return $this->validator($data, $validate, $messages, $attrs);
    }
}
