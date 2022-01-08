<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
    //
    public  function village(){
        return $this->hasMany(villages::class);
    }
}
