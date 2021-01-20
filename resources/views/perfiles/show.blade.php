@extends('layouts.app')

@section('content')
{{$perfil->usuario}}
<div class="conatiner">
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
</div>

@endsection