@extends('layouts.app');
@section('botones')
    <a href="/recetas" class="btn btn-primary text-white">Ver elemento</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Crear Nueva elemento</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post">
                <div class="form-group">
                     <label for="titulo">Titulo Elemento</label>
                     <input type="text"
                            name="titulo"
                            class="form-group"
                            id="titulo"
                            placeholder="Titulo Elemento"
                     >
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

