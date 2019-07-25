<?php

namespace App\Repositories;

use App\Models\Documents;
use App\Repositories\BaseRepository;

/**
 * Class DocumentsRepository
 * @package App\Repositories
 * @version July 25, 2019, 5:28 pm UTC
*/

class DocumentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'proof_of_identity',
        'proof_of_identity_type',
        'proof_of_address',
        'proof_of_address_type',
        'verification_status'
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
        return Documents::class;
    }
}
