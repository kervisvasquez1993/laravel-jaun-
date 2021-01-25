@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <p>Nombre : </p>
        </div>
        <div class="col-md-7">
            <h2 class="text-center mb-2 text-primary">
                {{$perfil->usuario->name}}
            </h2>
            <a href="{{$perfil->usuario->url}}"> Visitar sitio web</a>
        </div>
    </div>
    <div class="row">
        <p>{{$perfil->biografia}}</p>
        <div class="form-group mt-3">
            <label for="imagen">Tu imagen </label>
                @if($perfil->imagen)
                <div class="mt-4">
                    <img src="/storage/{{$perfil->imagen}}" style="width: 300px" alt=""> 
                </div>
                @endif
        </div>
    </div>
</div>

@endsection