<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DeliveryType
 * @package App\Models
 * @version July 31, 2019, 6:14 pm UTC
 *
 * @property string type
 * @property boolean status
 */
class DeliveryType extends Model
{
    public $table = 'delivery_types';
    


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
