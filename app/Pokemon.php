<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    //significa que un pokemon pertenece a un entenador / muchos pokemons pertenecen a un entrenador


    public function vistas(){
    	return $this->belongsTo('App\Vista');
    }
   
}
