<?php

namespace App\Repositories;

use App\Models\UserType;

/**
 * Class UserTypeRepository
 * @package App\Repositories
 * @version July 25, 2019, 4:37 pm UTC
*/

class UserTypeRepository extends BaseRepository
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
        return UserType::class;
    }
}
