<?php

namespace App\Repositories;

use App\AnimalSurveillanceFinal;
use App\Repositories\BaseRepository;

/**
 * Class AnimalSurveillanceFinalRepository
 * @package App\Repositories
 * @version January 13, 2022, 12:24 am IST
*/

class AnimalSurveillanceFinalRepository extends BaseRepository
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
        'status'
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
        return AnimalSurveillanceFinal::class;
    }
}
