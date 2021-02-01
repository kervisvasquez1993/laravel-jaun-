@extends('layouts.app')
@section('style')
@endsection

@section('content')
<div class="conatiner nueva-recetas">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
        Últimas recetas
    </h2>
    <div class="row">
        @foreach($nuevas as $nueva)
        <div class="col-md-4">
            <div class="card">
                <img src="/storage/{{$nueva->imagen}}" class="card-img-top" alt="imagen receta">
            </div>
            <div class="card-body">
                <h3>{{ Str::title($nueva->titulo) }}</h3>
                <p>{{Str::words(strip_tags($nueva->preparacion), 10 )}}</p>
                <a href="{{route('recetas.show', ['receta' => $nueva->id])}}" class="btn btn-primary d-block font-weight-bold text-uppercase">
                    Ver receta
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

    
@foreach($recetas as $key => $global)
<div class="container">
    <h2 class="titulo-categria text-uppercase mt-5 mb-4">
        {{ str_replace('-',' ', $key)}}

    </h2>
    <div class="row">
        <div class="container">
            @foreach($global as $recetas)

                @foreach($recetas as $receta)
                    <div class="col-md-4 mt-4">
                        <div class="card shadow">
                            <img src="/storage/{{$receta->imagen}}" alt="" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">
                                {{$receta->titulo}}
                            </h3>
                        </div>
                    </div>
                @endforeach
                
            @endforeach
        </div>
    </div>
</div>
    
@endforeach
@endsection