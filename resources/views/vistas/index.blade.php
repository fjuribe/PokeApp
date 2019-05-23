@extends('layouts.app')

@section('title','vistas')

@section('content')

{{-- mensajes flash --}}
{{-- @if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
@endif --}}
@include('vistas.common.success')


           <div class="row">
   @foreach($vista as $vist)
       {{-- <p>{{$vist->nombre}}</p>   --}} 
              <div class="col-sm">
                    <div class="card text-center my-5" style="width: 18rem;">
                     <img style="height: 100px; width: 100px; background-color: #EFEFEF" class="card-img-top rounded-circle mx-auto d-block my-4" src="images/{{$vist->avatar}}" alt="">
                     <div class="card-body">
                       <h5 class="card-title text-uppercase">{{$vist->nombre}}</h5>
                       <p class="card-text">{{$vist->comentario}}</p>
                       <a href="/vistas/{{$vist->slug}}" class="btn btn-primary ">Ver Entrenador</a>
                     </div>
                   </div>
                
              </div>



   @endforeach
           </div>
@endsection