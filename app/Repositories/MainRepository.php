<?php

namespace App\Repositories;

use App\Models\Main;
use App\Repositories\BaseRepository;

/**
 * Class MainRepository
 * @package App\Repositories
 * @version December 29, 2020, 5:37 pm UTC
*/

class MainRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'subtitle',
        'background'
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
        return Main::class;
    }
}
