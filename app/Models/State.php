<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class State
 * @package App\Models
 * @version July 25, 2019, 5:06 pm UTC
 *
 * @property string name
 * @property integer country_id
 * @property string status
 */
class State extends Model
{

    public $table = 'states';
    


    public $fillable = [
        'name',
        'country_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => '.'
    ];

    
}
