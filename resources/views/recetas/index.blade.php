@extends('layouts.app')

@section('botones')
    <a href="{{route('recetas.create')}}" class="btn btn-outline-primary text-uppercase font-weight-bold">Crear Elementos</a>
    <a href="{{route('perfiles.edit', ['perfil' => Auth::user()->id] )}}" class="btn btn-outline-success text-uppercase font-weight-bold">Editar Perfil</a>
    <a href="{{route('perfiles.show', ['perfil' => Auth::user()->id] )}}" class="btn btn-outline-info text-uppercase font-weight-bold">Ver Perfil</a>
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
        
        {{$recetas->links()}}

       {{--  {{$usuario->meGusta}} --}}
        <h2 class="text-center-my-5">
            Recetas Me Gusta
        </h2>
        <div class="col-md-10 mx-auto bg-white p-3">
            <ul class="list-group">
                @foreach($usuario->meGusta as $receta)
                    <li-list-group-item class="d-flex justify-content-betwenn align-items-center">
                        <p>
                            {{$receta->titulo}}
                        </p>
                    </li-list-group-item>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

