<?php

namespace App;

use Eloquent as Model;

/**
 * Class Councils
 * @package App
 * @version April 23, 2022, 12:23 pm IST
 *
 * @property string $name
 * @property integer $region_id
 */
class Councils extends Model
{

    public $table = 'tbl_councils';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'region_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'region_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:200',
        'region_id' => 'nullable|integer'
    ];

    
}
