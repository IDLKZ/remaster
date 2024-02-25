<?php

namespace App\Repositories;

use App\Models\FreedomToken;
use App\Repositories\BaseRepository;

/**
 * Class FreedomTokenRepository
 * @package App\Repositories
 * @version February 25, 2024, 8:07 am UTC
*/

class FreedomTokenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'refresh_token',
        'access_token'
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
        return FreedomToken::class;
    }
}
