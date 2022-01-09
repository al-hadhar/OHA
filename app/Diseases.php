<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diseases extends Model
{
    //
    public $table ='tbl_disease';
    protected  $primaryKey = 'dis_id';
    const UPDATED_AT = 'UPDATED_DATE';
    const CREATED_AT = 'CREATED_DATE';
    public  $fillable = [
        'dis_id',
        'dis_name'
    ];
    protected  $casts = [
        'dis_id'=>'integer',
        'dis_name'=>'string'
    ];
}
