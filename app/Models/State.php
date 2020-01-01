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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cities()
    {
        return $this->hasMany(\App\Models\City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'id', 'country_id');
    }
}
