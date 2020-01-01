<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ConsignmentType
 * @package App\Models
 * @version July 31, 2019, 6:18 pm UTC
 *
 * @property string type
 * @property boolean status
 */
class ConsignmentType extends Model
{
    public $table = 'consignment_types';
    


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
