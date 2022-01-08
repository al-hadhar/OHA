<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observations extends Model
{
    //
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
