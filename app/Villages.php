<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class villages extends Model
{
    //
    public  $table ='tbl_village';
    protected  $primaryKey='vill_id';
    const UPDATED_AT = 'UPDATED_DATE';
    const CREATED_AT = 'CREATED_DATE';
    public $fillable = [
        'vill_id',
        'vill_name',
        'dist_id'
    ];
    protected  $casts = [
        'vill_id'=>'integer',
        'vill_name'=>'string',
        'dist_id' => 'integer'
    ];
    public static $rules =[
        'vill_name'=>'required'
    ];
}
