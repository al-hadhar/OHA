<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regions extends Model
{
    //
    public $table ='regions';
    protected $primaryKey ='reg_id';
    const CREATED_AT = 'CREATED_DATE';
    const UPDATED_AT = 'UPDATED_DATE';
    public $fillable = [
        'reg_id',
        'reg_name'
        ];
    protected $casts =[
        'reg_id'=>'integer',
        'reg_name'=>'string'
    ];
    public static $rules = [
        'reg_name' =>'required'
    ];
    public function district(){
        return $this->hasMany(Districts::class);
    }
}
