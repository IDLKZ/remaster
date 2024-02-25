<?php

namespace App\Repositories;

use App\Models\FreedomRequest;
use App\Repositories\BaseRepository;

/**
 * Class FreedomRequestRepository
 * @package App\Repositories
 * @version February 25, 2024, 7:55 am UTC
*/

class FreedomRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iin',
        'mobile_phone',
        'verification_sms_code',
        'email',
        'product',
        'period',
        'principal',
        'uuid',
        'is_success'
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
        return FreedomRequest::class;
    }
}
