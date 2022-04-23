<?php

namespace App;

use Eloquent as Model;

/**
 * Class UploadHeader
 * @package App
 * @version April 23, 2022, 12:23 pm IST
 *
 * @property integer $type
 * @property string $file_name
 * @property string $file_path
 * @property integer $total_success
 * @property integer $total_failed
 * @property integer $status
 */
class UploadHeader extends Model
{

    public $table = 'upload_header';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'type',
        'file_name',
        'file_path',
        'total_success',
        'total_failed',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'file_name' => 'string',
        'file_path' => 'string',
        'total_success' => 'integer',
        'total_failed' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'nullable|integer',
        'file_name' => 'nullable|string|max:100',
        'file_path' => 'nullable|string|max:200',
        'total_success' => 'nullable|integer',
        'total_failed' => 'nullable|integer',
        'status' => 'nullable|integer',
        'created_at' => 'required',
        'updated_at' => 'nullable'
    ];

    
}
