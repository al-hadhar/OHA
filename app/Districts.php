<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
    //
    public $table='tbl_district';
    protected $primaryKey='dist_id';
    const UPDATED_AT = 'UPDATED_DATE';
    const  CREATED_AT = 'CREATED_DATE';
    public $fillable = [
        'dist_id',
        'dist_name',
        'reg_id'
    ];
    protected $casts = [
        'dist_id'=>'integer',
        'dist_name'=>'string',
        'reg_id'=>'integer'
    ];
    public static  $rules = [
        'dist_name'=>'required',
        'reg_id'=>'required'
    ];
    public  function village(){
        return $this->hasMany(Villages::class);
    }
}
