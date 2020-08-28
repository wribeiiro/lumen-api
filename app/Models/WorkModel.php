<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkModel extends Model {
    
    /**
     * @var string
     */

    protected $table = 'recent_works';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client', 'description', 'link', 'image', 'class', 'tags'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Validate request
     *
     * @return array
     */
    public static function validate() {
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
