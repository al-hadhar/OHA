<?php

namespace App;

use Eloquent as Model;

/**
 * Class HumanSurveillanceFinal
 * @package App
 * @version February 20, 2022, 10:32 pm IST
 *
 * @property integer $id
 * @property integer $upload_header_id
 * @property string $organisation_unit_name
 * @property string $organisation_unit_code
 * @property string $disease
 * @property integer $one_month_to_below_five_year
 * @property integer $five_to_below_sixty_years
 * @property string $observation_date
 */
class HumanSurveillanceFinal extends Model
{

    public $table = 'tbl_human_surveillance_final';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'upload_header_id' => 'integer',
        'organisation_unit_name' => 'string',
        'organisation_unit_code' => 'string',
        'disease' => 'string',
        'one_month_to_below_five_year' => 'integer',
        'five_to_below_sixty_years' => 'integer',
        'observation_date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'upload_header_id' => 'nullable|integer',
        'organisation_unit_name' => 'nullable|string|max:200',
        'organisation_unit_code' => 'nullable|string|max:100',
        'disease' => 'nullable|string|max:100',
        'one_month_to_below_five_year' => 'nullable|integer',
        'five_to_below_sixty_years' => 'nullable|integer',
        'observation_date' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
