<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observations extends Model
{
    //
    public $table = 'tbl_observation';
    protected  $primaryKey ='obs_id';
    const UPDATED_AT = 'UPDATED_DATE';
    const CREATED_AT = 'CREATED_DATE';
    public $fillable = [
        'obs_id', 'vill_id','spec_id','dis_id','obs_date','obs_cases','obs_death', 'obs_not_risked','obs_treated','obs_destroyed', 'obs_slaughter','obs_vaccinated','obs_long','obs_lat'
    ];
    protected $casts = [
        'obs_id'=>'integer',
         'vill_id'=>'integer',
         'spec_id'=>'integer',
         'dis_id'=>'integer',
         'obs_date'=>'string',
        'obs_cases'=>'integer',
        'obs_death'=>'integer',
        'obs_not_risked'=>'integer',
        'obs_treated'=>'integer',
        'obs_destroyed'=>'integer',
        'obs_slaughter'=>'integer',
        'obs_vaccinated'=>'integer',
        'obs_long'=>'string',
        'obs_lat'=>'string'
    ];
    public function village(){
        return $this->hasMany(villages::class);
    }
    public function disease(){
        return $this->hasMany(diseases::class);
    }
    public function specimen(){
        return $this->hasMany(specimen::class);
    }
}
