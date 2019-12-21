<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class City
 * @package App\Models
 * @version July 25, 2019, 5:10 pm UTC
 *
 * @property \App\Models\State id
 * @property \App\Models\Country id
 * @property string name
 * @property integer state_id
 * @property integer country_id
 * @property boolean status
 */
class City extends Model
{

    public $table = 'cities';



    public $fillable = [
        'name',
        'state_id',
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
        'state_id' => 'integer',
        'country_id' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\State::class, 'id', 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'id', 'country_id');
    }
}
