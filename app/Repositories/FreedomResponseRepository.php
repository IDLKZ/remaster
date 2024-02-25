<?php

namespace App\Repositories;

use App\Models\FreedomResponse;
use App\Repositories\BaseRepository;

/**
 * Class FreedomResponseRepository
 * @package App\Repositories
 * @version February 25, 2024, 8:08 am UTC
*/

class FreedomResponseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'data',
        'success'
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
        return FreedomResponse::class;
    }
}
