<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Consignment",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="provider_id",
 *          description="provider_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="consignment_type_id",
 *          description="consignment_type_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="delivery_type_id",
 *          description="delivery_type_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="rate",
 *          description="rate",
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
class Consignment extends Model
{

    public $table = 'consignments';
    


    public $fillable = [
        'provider_id',
        'consignment_type_id',
        'delivery_type_id',
        'rate',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'provider_id' => 'integer',
        'consignment_type_id' => 'integer',
        'delivery_type_id' => 'integer',
        'rate' => 'double',
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
    public function courierProvider()
    {
        return $this->hasOne(\App\Models\CourierProvider::class, 'id', 'provider_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function consignmentType()
    {
        return $this->hasOne(\App\Models\ConsignmentType::class, 'id', 'consignment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function deliveryType()
    {
        return $this->hasOne(\App\Models\DeliveryType::class, 'id', 'delivery_type_id');
    }
}
