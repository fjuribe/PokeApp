@extends('layouts.app')

@section('title','editar')

@section('content')
@include('vistas.common.errors')

  <div class="container text-center">
          <div class="form-group">
       <form class="form-group" method="POST" action="/vistas/{{$vista->slug}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf﻿
        


      {{--   @include('vistas.form') --}}
         <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{$vista->nombre}}" >
         </div>

         <div class="form-group">
              <label for="">Slug</label>
              <input type="text" name="slug" class="form-control" value="{{$vista->slug}}" >
        </div>

          <div class="form-group">
            <label for="">comentario</label>
            <textarea for="" name="comentario" class="form-control" id="exampleFormControlTextarea3" rows="5" >{{$vista->comentario}}</textarea>
         </div>
             
         <div class="form-group">
            <label for="">Avatar</label><br>
            <input type="file" name="avatar">
         </div>


          
             <button type="submit" class="btn btn-primary mt-1">Acutalizar </button>

       	
       </form>
     </div>
   </div>

@endsection
