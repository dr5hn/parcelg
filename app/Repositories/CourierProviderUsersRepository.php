<?php

namespace App\Repositories;

use App\Models\CourierProviderUsers;

/**
 * Class CourierProviderUsersRepository
 * @package App\Repositories
 * @version July 25, 2019, 5:58 pm UTC
*/

class CourierProviderUsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'provider_id',
        'user_id',
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
        return CourierProviderUsers::class;
    }
}
