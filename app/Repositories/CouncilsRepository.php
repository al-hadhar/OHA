<?php

namespace App\Repositories;

use App\Councils;
use App\Repositories\BaseRepository;

/**
 * Class CouncilsRepository
 * @package App\Repositories
 * @version April 23, 2022, 12:23 pm IST
*/

class CouncilsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'region_id'
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
        return Councils::class;
    }
}
