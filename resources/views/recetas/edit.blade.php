@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection
@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary text-white">Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Editar Receta {{$receta->titulo}}</h2>
    {{-- {{$receta}} --}}
    {{-- {{$categorias}} --}}

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post" action="{{route('recetas.update', ['receta' => $receta->id])}}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                     <label for="titulo">Titulo Elemento </label>
                     <input type="text"
                            name="titulo"
                            class="form-group @error('titulo') is-invalid @enderror"
                            id="titulo"
                            placeholder="Titulo Elemento"
                            value="{{$receta->titulo}}"
                     >
                    @error('titulo')
                      <span class="invalid-feedback d-block" role="alert">
                        <strong> {{$message}}</strong>
                      </span>
                    @enderror

                </div>

            
                <div class="form-group">
                    <label for="categoria">categoria</label>
                    <select
                        name="categoria"
                        class="form-control @error('titulo') is-invalid @enderror"
                        id="categoria"
                    >
                        <option value=""> Seleccione
                            @foreach($categorias as  $categoria)
                                <option
                                 value="{{$categoria->id}}"
                                 {{$receta->categoria_id == $categoria->id ? 'selected' : ''}}
                                 >
                                 {{$categoria->nombre}}
                                </option>
                            @endforeach
                        </option>
                    </select>

                    @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong> {{$message}}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="preparacion">Preparacion</label>
                    <input type="hidden" id="preparacion" name="preparacion" value="{{$receta->preparacion}}">
                    <trix-editor
                    class="form-control @error('preparacion') is-invalid @enderror"
                    input="preparacion"></trix-editor>
                    @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong> {{$message}}</strong>
                      </span>
                    @enderror
                </div>

                

                <div class="form-group mt-4">
                    <label for="ingredientes">ingredientes</label>
                    <input type="hidden" id="ingredientes" name="ingredientes" value="{{$receta->ingredientes}}">
                    <trix-editor
                    class="form-control @error('ingredientes') is-invalid @enderror"
                    input="ingredientes"></trix-editor>
                    @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong> {{$message}}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input 
                         type="file"
                         id="imagen"
                         class="form-control @error('imagen') is-invalid @enderror"
                         name="imagen"
                         >
                         <div class="mt-4">
                             <p>imagen actual</p>
                             <img src="/storage/{{$receta->imagen}}" style="width: 300px" alt="">
                         </div>
                         @error('imagen')
                         <span class="invalid-feedback d-block" role="alert">
                             <strong> {{$message}}</strong>
                           </span>
                         @enderror
                </div>

               

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar elemento">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection
