<?php

namespace App\Repositories;

use App\HumanSurveillanceFinal;
use App\Repositories\BaseRepository;

/**
 * Class HumanSurveillanceFinalRepository
 * @package App\Repositories
 * @version February 20, 2022, 10:32 pm IST
*/

class HumanSurveillanceFinalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'upload_header_id',
        'organisation_unit_name',
        'organisation_unit_code',
        'disease',
        'one_month_to_below_five_year',
        'five_to_below_sixty_years',
        'observation_date'
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
        return HumanSurveillanceFinal::class;
    }
}
