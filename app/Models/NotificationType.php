<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class NotificationType
 * @package App\Models
 * @version July 31, 2019, 6:24 pm UTC
 *
 * @property string type
 * @property string template
 * @property boolean status
 */
class NotificationType extends Model
{
    public $table = 'notification_types';
    


    public $fillable = [
        'type',
        'template',
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
