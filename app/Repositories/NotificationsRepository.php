<?php

namespace App\Repositories;

use App\Models\Notifications;

/**
 * Class NotificationsRepository
 * @package App\Repositories
 * @version July 31, 2019, 6:32 pm UTC
*/

class NotificationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'message',
        'user_id',
        'notification_type_id',
        'channel',
        'schedule',
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
        return Notifications::class;
    }
}
