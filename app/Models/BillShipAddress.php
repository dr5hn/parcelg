<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="BillShipAddress",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="flat_no",
 *          description="flat_no",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="building",
 *          description="building",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="street",
 *          description="street",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pincode",
 *          description="pincode",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="area",
 *          description="area",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city",
 *          description="city",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="latitude",
 *          description="latitude",
 *          type="float",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="longitude",
 *          description="longitude",
 *          type="float",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      )
 * )
 */
class BillShipAddress extends Model
{
    use SoftDeletes;

    public $table = 'bill_ship_addresses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'flat_no',
        'building',
        'street',
        'pincode',
        'area',
        'city',
        'state',
        'country',
        'type',
        'latitude',
        'longitude',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'flat_no' => 'string',
        'building' => 'string',
        'street' => 'string',
        'pincode' => 'string',
        'area' => 'string',
        'city' => 'integer',
        'state' => 'integer',
        'country' => 'integer',
        'type' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function city()
    {
        return $this->hasOne(\App\Models\City::class, 'id', 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function country()
    {
        return $this->hasOne(\App\Models\Country::class, 'id', 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function state()
    {
        return $this->hasOne(\App\Models\State::class, 'id', 'state_id');
    }
}
