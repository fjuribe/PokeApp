@extends('layouts.app')

@section('title','entenador')

@section('content')

{{-- @if(session('status'))
     <div class="alert alert-success">{{session('status')}}</div>
@endif --}}
@include('vistas.common.success')


  <div class="container text-center">
  
     <img style="height: 100px; width: 100px; background-color: #EFEFEF" class="card-img-top rounded-circle mx-auto d-block my-4" src="/images/{{$vista->avatar}}" alt="">      
      <h5 class="card-title text-uppercase">{{$vista->slug}}</h5>
      <h3 class="card-title text-uppercase">{{$vista->nombre}}</h3>

     <dir class="text-center">
       {{$vista->comentario}}
     </dir>
      <a href="/vistas/{{$vista->slug}}/edit" class="btn btn-primary ">Editar</a>




{{-- este codigo borra lo anterior  --}}
      <form method="POST" action="/vistas/{{$vista->slug}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Eliminar">
            </div>
      </form>﻿
   </div>
  
<add-pokemon-btn></add-pokemon-btn>
<create-pokemon></create-pokemon>
<pokemons-component></pokemons-component>
@endsection

