<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserType
 * @package App\Models
 * @version July 25, 2019, 4:37 pm UTC
 *
 * @property string type
 * @property boolean status
 */
class UserType extends Model
{
    public $table = 'user_types';
    


    public $fillable = [
        'type',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
