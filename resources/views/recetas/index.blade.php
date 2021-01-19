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
                        <td>{{$receta->categoria->nombre}}</td>
                        <td>
                           {{--  <form action="{{route('recetas.destroy', ['receta' => $receta->id])}}" method="post">
                                 @csrf
                                @method('DELETE') --}}
                                {{-- <input type="submit" class="btn btn-danger  d-block w-100 mb-2" value="Eliminar &times;">
                             --}}{{-- </form> --}}
                             <eliminar-receta 
                                receta-id = {{$receta->id}}
                             ></eliminar-receta>
                            <a href="{{route('recetas.edit', ['receta' => $receta->id])}}" class="btn btn-dark  d-block mb-2">editar</a>
                            <a href="{{route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-success  d-block mb-2">ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tdody>
            </tbody>
        </table>
    </div>
@endsection

