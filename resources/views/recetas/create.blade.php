@extends('layouts.app');
@section('botones')
    <a href="/recetas" class="btn btn-primary text-white">Ver elemento</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Crear Nueva elemento</h2>
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
                <tr>
                    <td>Pizza</td>
                    <td>Pizza</td>
                    <td></td>
                </tr>
            </tdody>
            </tbody>
        </table>
    </div>
@endsection

