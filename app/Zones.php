<?php

namespace App;

use Eloquent as Model;

/**
 * Class Zones
 * @package App
 * @version April 23, 2022, 12:29 pm IST
 *
 * @property string $name
 */
class Zones extends Model
{

    public $table = 'tbl_zones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:200'
    ];

    
}
