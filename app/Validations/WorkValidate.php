<?php

namespace App\Validations;

final class WorkValidation
{
    public static function validate()
    {
        return [
            'client'      => 'required|min:3|max:50',
            'date_deploy' => 'required',
            'link'        => 'required|min:3|max:255',
            'image'       => 'required|min:3|max:255',
            'class'       => 'required|min:3|max:100',
            'tags'        => 'required|min:3|max:100'
        ];
    }
}
