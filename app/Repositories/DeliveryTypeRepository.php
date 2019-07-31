<?php

namespace App\Repositories;

use App\Models\DeliveryType;
use App\Repositories\BaseRepository;

/**
 * Class DeliveryTypeRepository
 * @package App\Repositories
 * @version July 31, 2019, 6:14 pm UTC
*/

class DeliveryTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
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
        return DeliveryType::class;
    }
}
