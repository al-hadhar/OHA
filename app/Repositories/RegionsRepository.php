<?php

namespace App\Repositories;

use App\Regions;
use App\Repositories\BaseRepository;

/**
 * Class RegionsRepository
 * @package App\Repositories
 * @version April 23, 2022, 12:23 pm IST
*/

class RegionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'zone_id',
        'name'
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
        return Regions::class;
    }
}
