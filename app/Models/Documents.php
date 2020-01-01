<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Documents
 * @package App\Models
 * @version July 25, 2019, 5:28 pm UTC
 *
 * @property string proof_of_identity
 * @property string proof_of_identity_type
 * @property string proof_of_address
 * @property string proof_of_address_type
 * @property boolean verification_status
 */
class Documents extends Model
{
    public $table = 'documents';
    


    public $fillable = [
        'proof_of_identity',
        'proof_of_identity_type',
        'proof_of_address',
        'proof_of_address_type',
        'verification_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'proof_of_identity' => 'string',
        'proof_of_identity_type' => 'string',
        'proof_of_address' => 'string',
        'proof_of_address_type' => 'string',
        'verification_status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
