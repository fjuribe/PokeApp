@extends('layouts.app')

@section('title','mi titulo')

@section('content')

{{-- con blade preguntaremos si existen errores --}}
{{--   @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach   	
    </div>
  @endif --}}
@include('vistas.common.errors')

     <div class="form-group">
       <form class="form-group" method="POST" action="/vistas" enctype="multipart/form-data">
        @csrf﻿
         
         @include('vistas.form')


          
             <button type="submit" class="btn btn-primary mt-1">Guarda </button>

       	
       </form>
     </div>

@endsection
