<?php

namespace App\Repositories;

use App\Models\BillShipAddress;
use App\Repositories\BaseRepository;

/**
 * Class BillShipAddressRepository
 * @package App\Repositories
 * @version July 25, 2019, 5:23 pm UTC
*/

class BillShipAddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'flat_no',
        'building',
        'street',
        'pincode',
        'area',
        'city',
        'state',
        'country',
        'type',
        'latitude',
        'longitude',
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
        return BillShipAddress::class;
    }
}
