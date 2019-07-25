<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CourierProvider",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="business_name",
 *          description="business_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="gst_number",
 *          description="gst_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pan_number",
 *          description="pan_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="owner_user_id",
 *          description="owner_user_id",
 *          type="integer",
 *          format="int32"
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
class CourierProvider extends Model
{
    use SoftDeletes;

    public $table = 'courier_providers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'business_name',
        'owner_user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'business_name' => 'string',
        'gst_number' => 'string',
        'pan_number' => 'string',
        'owner_user_id' => 'integer',
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
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'owner_user_id');
    }
}
