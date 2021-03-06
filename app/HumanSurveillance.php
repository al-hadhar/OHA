<?php

namespace App;

use Eloquent as Model;

/**
 * Class HumanSurveillance
 * @package App
 * @version April 23, 2022, 8:42 am IST
 *
 * @property integer $id
 * @property integer $upload_header_id
 * @property string $organisation_unit_name
 * @property string $organisation_unit_code
 * @property string $disease
 * @property string $zero_year
 * @property string $one_to_below_five_years
 * @property string $five_to_below_sixty_years
 * @property string $observation_date
 * @property integer $status
 * @property integer $valid_status
 * @property string $reject_reason
 */
class HumanSurveillance extends Model
{

    public $table = 'tbl_human_surveillance_staging';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'id',
        'upload_header_id',
        'organisation_unit_name',
        'organisation_unit_code',
        'disease',
        'zero_year',
        'one_to_below_five_years',
        'five_to_below_sixty_years',
        'observation_date',
        'status',
        'valid_status',
        'reject_reason'
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
        'zero_year' => 'string',
        'one_to_below_five_years' => 'string',
        'five_to_below_sixty_years' => 'string',
        'observation_date' => 'string',
        'status' => 'integer',
        'valid_status' => 'integer',
        'reject_reason' => 'string'
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
        'zero_year' => 'nullable|string|max:10',
        'one_to_below_five_years' => 'nullable|string|max:10',
        'five_to_below_sixty_years' => 'nullable|string|max:10',
        'observation_date' => 'nullable|string|max:50',
        'status' => 'nullable|integer',
        'valid_status' => 'nullable|integer',
        'reject_reason' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
