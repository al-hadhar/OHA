<?php

namespace App\Repositories;

use App\HumanSurveillanceFinal;
use App\Repositories\BaseRepository;

/**
 * Class HumanSurveillanceFinalRepository
 * @package App\Repositories
 * @version January 15, 2022, 2:36 am IST
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
        'one_month_to_below_one_year',
        'one_to_below_five_years',
        'five_to_below_sixty_years'
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
