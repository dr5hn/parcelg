<?php

namespace App\Repositories;

use App\Models\CourierProvider;
use App\Repositories\BaseRepository;

/**
 * Class CourierProviderRepository
 * @package App\Repositories
 * @version July 25, 2019, 5:54 pm UTC
*/

class CourierProviderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'business_name',
        'gst_number',
        'pan_number',
        'owner_user_id',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CourierProvider::class;
    }
}
