@extends('layouts.app')

@section('content')
<article class="contenido-receta">
    {{-- <h2 class="text-center mb-4"> {{$receta}}</h2> --}}
    <div class="imagen-receta">
        <img src="/storage/{{$receta->imagen}}" class="w-100">
    </div>
    <div class="receta-meta">
        <p>
            <span class="font-weigth-bold text-primary">
                Escrito en:
            </span>

            {{$receta->categoria->nombre}}
        </p>

        <p>
            <span class="font-weigth-bold text-primary">
                Fecha:
            </span>

            {{$receta->created_at}}
        </p>

        <p>
            <span class="font-weigth-bold text-primary">
                Autor:
            </span>
            {{-- Mostrar el usuario --}}
            {{$receta->user_id}}
        </p>
        <div class="ingrediente">
            <h3 class="my-3 text-primary">
                {!! $receta->ingredientes !!}
            </h3>
        </div>
        <div class="preparacion">
            <h3 class="my-3 text-primary">
                {!! $receta->preparacion !!}
            </h3>
        </div>
    </div>
</article>
@endsection