<?php

namespace App\Repositories;

use App\Models\NotificationType;
use App\Repositories\BaseRepository;

/**
 * Class NotificationTypeRepository
 * @package App\Repositories
 * @version July 31, 2019, 6:24 pm UTC
*/

class NotificationTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'template',
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
        return NotificationType::class;
    }
}
