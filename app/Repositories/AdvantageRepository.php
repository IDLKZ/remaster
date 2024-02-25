<?php

namespace App\Repositories;

use App\Models\Advantage;
use App\Repositories\BaseRepository;

/**
 * Class AdvantageRepository
 * @package App\Repositories
 * @version February 25, 2024, 6:42 am UTC
*/

class AdvantageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'sub_title',
        'image_url'
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
        return Advantage::class;
    }
}
