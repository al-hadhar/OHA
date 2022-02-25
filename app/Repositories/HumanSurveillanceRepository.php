<?php

namespace App\Repositories;

use App\HumanSurveillance;
use App\Repositories\BaseRepository;

/**
 * Class HumanSurveillanceRepository
 * @package App\Repositories
 * @version January 15, 2022, 2:36 am IST
*/

class HumanSurveillanceRepository extends BaseRepository
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
        'five_to_below_sixty_years',
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
        return HumanSurveillance::class;
    }
}
