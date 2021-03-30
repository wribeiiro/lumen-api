<?php

namespace App\Validations;

final class WorkValidation
{
    public static function validate()
    {
        return [
            'name' => 'required|min:3|max:255',
            'link' => 'required|min:3|max:255',
            'image' => 'required|min:3|max:255',
            'tags' => 'required|min:3|max:100'
        ];
    }
}
