<?php

namespace App\Http\Controllers;
use App\Vista;
use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //
    public function index(Vista $vista,Request $request){

    	if ($request->ajax()) {

    	     return response()->json($vista->pokemons,200);
    	}
    	return view('pokemons.index');
    }


    public function store(Vista $vista,Request $request){
             if ($request->ajax()) {
             	      $pokemon = new Pokemon();
             	      $pokemon->name = $request->input('name');
             	      $pokemon->picture = $request->input('picture');
                      //accedemos a su relacion y luego a su atributo
                      $pokemon->vistas()->associate($vista)->save();


             	      // $pokemon->save();


             	      return response()->json([
                        // "vista"=>$vista,
                        'mensaje'=>'pokemon creado correctamente',
             	      	'pokemon'=>$pokemon
             	      	],200);
             }
    }
}
