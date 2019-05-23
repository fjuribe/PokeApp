<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vista extends Model
{
   
protected $fillable=['nombre','comentario','slug','avatar'];




//????????????????
    public function getRouteKeyName(){
    	return 'slug';
    }
//un entrenador tiene muchos pokeomons
public function pokemons(){
	return $this->hasMany('App\Pokemon');
    }

}
