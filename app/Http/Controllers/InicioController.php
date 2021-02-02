<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaRecetas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {

        // contar las recetas con la cantidad de votos
        /* $votada = Receta::has('likes', '=', 1)->get(); */

        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return $votadas;
        // obtener las recetas mas nuevas 
        /* $receta = Receta::orderBy('created_at', 'ASC')->get(); */
        /* $receta = Receta::oldest()->get();  los mas nuevo*/
        $nuevas = Receta::latest()->take(3)->get(); // los mas viejos
        
        // obtener todas las categorias 
        $categorias = CategoriaRecetas::all();
        // agrupar las recetas por categorias
        $recetas = [];
        foreach($categorias as $categoria):
            $recetas[ Str::slug($categoria->nombre)][] = Receta::where('categoria_id', $categoria->id)->get();
        endforeach;

        /* return $receta; */
        // recetas por categoria 
        return view('inicio.index',compact('nuevas', 'recetas'));
    }
}
