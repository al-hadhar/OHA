<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specimen extends Model
{
    //
    public $table ='tbl_specimen';
    protected  $primaryKey='spec_id';
    const UPDATED_AT = 'UPDATED_DATE';
    const CREATED_AT = 'CREATED_DATE';
    public $fillable =[
        'spec_id',
        'spec_name',
        'spec_age'
    ];
    protected  $casts = [
        'spec_id'=>'integer',
        'spec_name'=>'string',
        'spec_age'=>'integer'
    ];
}
