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
<h2 class="text-center my-5">
    Recetas Creada por {{$perfil->usuario->name}}    
</h2>
<div class="container">
    <div class="row max-auto bg-white p-4">
        @if(count($recetas) > 0)
            @foreach($recetas as $receta)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <h3>
                            <img src="/storage/{{$receta->imagen}}" class="card-img-top" alt="imagen receta">
                            
                            <div class="card-body">
                                {{$receta->titulo}}
                                <a href="{{route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">Ver Receta</a>
                            </div>
                        </h3>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center w-100"> NO HAY RECETAS</p>
        @endif

        {{$recetas->links()}}
    </div>
</div>


@endsection