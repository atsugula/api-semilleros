<?php

namespace App\Http\Utilities\Validates;

use Illuminate\Http\Resources\Json\JsonResource;
use Validator;
use App\Traits\FunctionGeneralTrait;

class dropDownListsValidates
{
    use FunctionGeneralTrait;
    public function validates($data)
    {
        $validate = [
            'name' => 'required|max:55',
            'user_id' => 'required|integer'
        ];

        $messages = [
            'name.required' => 'El campo :attribute es obligatorio',
            'name.max' => 'El campo :attribute debe tener máximo 55 caracteres',
            'user_id.required' => 'El campo :attribute es obligatorio',
            'user_id.integer' => 'El campo :attribute debe ser un numero entero'
        ];

        $attrs = [
            'name' => 'Nombre',
            'user_id' => 'Usuario'
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }
}
