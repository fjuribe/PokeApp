<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //creo el metodo para que se relaciones con la tabla User
    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
