<?php

namespace App;

use Eloquent as Model;

/**
 * Class AnimalSurveillance
 * @package App
 * @version January 12, 2022, 2:13 am IST
 *
 * @property string $region
 * @property string $district
 * @property string $village
 * @property string $observation_date
 * @property string $disease
 * @property string $specie_affected
 * @property string $cases
 * @property string $death
 * @property string $not_at_rist
 * @property string $treated
 * @property string $destroyed
 * @property string $slaughtered
 * @property string $vaccinated
 * @property integer $lat
 * @property integer $long
 * @property integer $status
 */
class AnimalSurveillance extends Model
{

    public $table = 'tbl_animal_surveillance_staging';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'upload_header_id',
        'region' => 'string',
        'district' => 'string',
        'village' => 'string',
        'observation_date' => 'string',
        'disease' => 'string',
        'specie_affected' => 'string',
        'cases' => 'string',
        'death' => 'string',
        'not_at_rist' => 'string',
        'treated' => 'string',
        'destroyed' => 'string',
        'slaughtered' => 'string',
        'vaccinated' => 'string',
        'lat' => 'integer',
        'long' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'region' => 'nullable|string|max:100',
        'district' => 'nullable|string|max:100',
        'village' => 'nullable|string|max:100',
        'observation_date' => 'nullable|string|max:70',
        'disease' => 'nullable|string|max:50',
        'specie_affected' => 'nullable|string|max:100',
        'cases' => 'nullable|string|max:10',
        'death' => 'nullable|string|max:10',
        'not_at_rist' => 'nullable|string|max:10',
        'treated' => 'nullable|string|max:10',
        'destroyed' => 'nullable|string|max:10',
        'slaughtered' => 'nullable|string|max:10',
        'vaccinated' => 'nullable|string|max:10',
        'lat' => 'nullable|integer',
        'long' => 'nullable|integer',
        'status' => 'nullable|integer'
    ];


}
