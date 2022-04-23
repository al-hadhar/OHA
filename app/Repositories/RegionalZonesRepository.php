<?php

namespace App\Repositories;

use App\RegionalZones;
use App\Repositories\BaseRepository;

/**
 * Class RegionalZonesRepository
 * @package App\Repositories
 * @version April 23, 2022, 12:13 pm IST
*/

class RegionalZonesRepository extends BaseRepository
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
        return RegionalZones::class;
    }
}
