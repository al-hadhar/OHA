<?php

namespace App\Repositories;

use App\AnimalSurveillance;
use App\Repositories\BaseRepository;

/**
 * Class AnimalSurveillanceRepository
 * @package App\Repositories
 * @version April 23, 2022, 8:41 am IST
*/

class AnimalSurveillanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'upload_header_id',
        'region',
        'district',
        'village',
        'observation_date',
        'disease',
        'specie_affected',
        'cases',
        'death',
        'not_at_rist',
        'treated',
        'destroyed',
        'slaughtered',
        'vaccinated',
        'lat',
        'long',
        'status',
        'valid_status',
        'reject_reason'
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
        return AnimalSurveillance::class;
    }
}
