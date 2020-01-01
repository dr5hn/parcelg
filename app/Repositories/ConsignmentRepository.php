<?php

namespace App\Repositories;

use App\Models\Consignment;

/**
 * Class ConsignmentRepository
 * @package App\Repositories
 * @version July 31, 2019, 6:42 pm UTC
*/

class ConsignmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'provider_id',
        'consignment_type_id',
        'delivery_type_id',
        'rate',
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
        return Consignment::class;
    }
}
