<?php

namespace App;

use Eloquent as Model;

/**
 * Class HumanSurveillanceFinal
 * @package App
 * @version January 15, 2022, 2:36 am IST
 *
 * @property integer $id
 * @property integer $upload_header_id
 * @property string $organisation_unit_name
 * @property string $organisation_unit_code
 * @property string $disease
 * @property integer $one_month_to_below_one_year
 * @property integer $one_to_below_five_years
 * @property integer $five_to_below_sixty_years
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
        'one_month_to_below_one_year',
        'one_to_below_five_years',
        'five_to_below_sixty_years'
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
        'one_month_to_below_one_year' => 'integer',
        'one_to_below_five_years' => 'integer',
        'five_to_below_sixty_years' => 'integer'
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
        'one_month_to_below_one_year' => 'nullable|integer',
        'one_to_below_five_years' => 'nullable|integer',
        'five_to_below_sixty_years' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
