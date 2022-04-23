<?php

namespace App\Repositories;

use App\Zones;
use App\Repositories\BaseRepository;

/**
 * Class ZonesRepository
 * @package App\Repositories
 * @version April 23, 2022, 12:29 pm IST
*/

class ZonesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Zones::class;
    }
}
