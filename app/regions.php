<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regions extends Model
{
    //
    public function district(){
        return $this->hasMany(districts::class);
    }
}
