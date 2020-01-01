<?php

namespace App\Repositories;

use App\Models\ConsignmentType;

/**
 * Class ConsignmentTypeRepository
 * @package App\Repositories
 * @version July 31, 2019, 6:18 pm UTC
*/

class ConsignmentTypeRepository extends BaseRepository
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
        return ConsignmentType::class;
    }
}
