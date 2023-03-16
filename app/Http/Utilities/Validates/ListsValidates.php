<?php

namespace App\Http\Utilities\Validates;

use App\Traits\FunctionGeneralTrait;

class ListsValidates
{
    use FunctionGeneralTrait;
    public function validates($data)
    {
        $validate = [
            'name' => 'required|max:80',
        ];

        $messages = [
            'name.required' => 'El campo :attribute es obligatorio',
            'name.max' => 'El campo :attribute debe tener máximo 80 caracteres',
        ];

        $attrs = [
            'name' => 'Nombre',
        ];

        return $this->validator($data, $validate, $messages, $attrs);

    }
}
