<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Country
 * @package App\Models
 * @version July 25, 2019, 4:58 pm UTC
 *
 * @property string name
 * @property string iso2
 * @property string iso3
 * @property string phonecode
 * @property string capital
 * @property string currency
 * @property boolean status
 */
class Country extends Model
{

    public $table = 'countries';



    public $fillable = [
        'name',
        'iso2',
        'iso3',
        'phonecode',
        'capital',
        'currency',
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
        'iso2' => 'string',
        'iso3' => 'string',
        'phonecode' => 'string',
        'capital' => 'string',
        'currency' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function states()
    {
        return $this->hasMany(\App\Models\State::class);
    }


}
