<?php

namespace App;

use Eloquent as Model;

/**
 * Class AnimalSurveillanceFinal
 * @package App
 * @version January 13, 2022, 12:24 am IST
 *
 * @property integer $upload_header_id
 * @property string $region
 * @property string $district
 * @property string $village
 * @property string $observation_date
 * @property string $disease
 * @property string $specie_affected
 * @property integer $cases
 * @property integer $death
 * @property integer $not_at_rist
 * @property integer $treated
 * @property integer $destroyed
 * @property integer $slaughtered
 * @property integer $vaccinated
 * @property number $lat
 * @property number $long
 * @property integer $status
 */
class AnimalSurveillanceFinal extends Model
{

    public $table = 'tbl_animal_surveillance_final';
    
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
        'upload_header_id' => 'integer',
        'region' => 'string',
        'district' => 'string',
        'village' => 'string',
        'observation_date' => 'string',
        'disease' => 'string',
        'specie_affected' => 'string',
        'cases' => 'integer',
        'death' => 'integer',
        'not_at_rist' => 'integer',
        'treated' => 'integer',
        'destroyed' => 'integer',
        'slaughtered' => 'integer',
        'vaccinated' => 'integer',
        'lat' => 'float',
        'long' => 'float',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'upload_header_id' => 'nullable|integer',
        'region' => 'nullable|string|max:100',
        'district' => 'nullable|string|max:100',
        'village' => 'nullable|string|max:100',
        'observation_date' => 'nullable|string|max:70',
        'disease' => 'nullable|string|max:50',
        'specie_affected' => 'nullable|string|max:100',
        'cases' => 'nullable|integer',
        'death' => 'nullable|integer',
        'not_at_rist' => 'nullable|integer',
        'treated' => 'nullable|integer',
        'destroyed' => 'nullable|integer',
        'slaughtered' => 'nullable|integer',
        'vaccinated' => 'nullable|integer',
        'lat' => 'nullable|numeric',
        'long' => 'nullable|numeric',
        'status' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
