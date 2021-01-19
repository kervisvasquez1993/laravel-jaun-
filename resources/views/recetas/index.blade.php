@extends('layouts.app');
@section('botones')
    <a href="{{route('recetas.create')}}" class="btn btn-primary text-white">Crear Elementos</a>
@endsection

@section('content')

{{-- {{$recetas}} --}}
 <h2 class="text-center mb-5"> Administra tus Elementos </h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th>Titulo</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tdody>
                    @foreach($recetas as $receta)
                    <tr>
                        <td>{{$receta->titulo}}</td>
                        <td>{{$receta->categoria_id}}</td>
                        <td>
                            <a href="#" class="btn btn-danger mr-1">Eliminar</a>
                            <a href="#" class="btn btn-dark mr-1">editar</a>
                            <a href="#" class="btn btn-success mr-1">ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tdody>
            </tbody>
        </table>
    </div>
@endsection

