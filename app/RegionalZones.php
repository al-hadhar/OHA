<?php

namespace App;

use Eloquent as Model;

/**
 * Class RegionalZones
 * @package App
 * @version April 23, 2022, 12:13 pm IST
 *
 * @property integer $zone_id
 * @property string $name
 */
class RegionalZones extends Model
{

    public $table = 'tbl_zones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'zone_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'zone_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'zone_id' => 'nullable|integer',
        'name' => 'nullable|string|max:200'
    ];

    
}
