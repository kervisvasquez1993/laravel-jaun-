<?php

namespace App\Http\Controllers;


use App\Receta;
use App\CategoriaRecetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;

class RecetaController extends Controller
{
    //agregar mideware para autenticacion

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Auth::user()->recetas->dd(); */
        /* auth()->user()->recetas->dd(); */
        $recetas = auth()->user()->recetas;
        return  view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /*  DB::table('categoria_receta')->get()->pluck('nombre','id')->dd(); */
       // obtener categoria sin modelo
       // $categorias = DB::table('categoria_receta')->get()->pluck('nombre','id');

        // con modelo 
        $categorias = CategoriaRecetas::all(['id','nombre']);
        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'titulo' => 'required | min:6',
            'categoria' => 'required | ',
            'preparacion' => 'required | ',
            'ingredientes' => 'required | ',
            /* 'imagen' => 'required | image | ', */
        ]); // pasamos todos los valores que traiamos de $request en $data
        //obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');
        //resize de imagenes
        $img = Image::make(public_path("storage/${ruta_imagen}"))->fit(1200,500);
        $img->save();
       /*  DB::table('recetas')->insert([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
            'categoria_id' => $data['categoria'],
        ]); */

        //almacenar 
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria'],
        ]);

        //redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\$receta
     * @return \Illuminate\Http\Response
     */
    public function show( Receta $receta)
    {
        
        return view('recetas.show')
               ->with('receta', $receta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\$receta
     * @return \Illuminate\Http\Response
     */
    public function edit( Receta $receta)
    {
       // con modelo 
       $categorias = CategoriaRecetas::all(['id','nombre']);
        return view('recetas.edit')
                ->with('categorias', $categorias)
                ->with('receta', $receta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {

        $this->authorize('update', $receta);
        
        $data = $request->validate([
            'titulo' => 'required | min:6',
            'categoria' => 'required | ',
            'preparacion' => 'required | ',
            'ingredientes' => 'required | ',
        ]);

        // asignar valores

        $receta->titulo = $data['titulo'];
        $receta->categoria_id = $data['categoria'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];
        // nueva imagen 

        if(request('imagen'))
        {
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');
            //resize de imagenes
           $img = Image::make(public_path("storage/${ruta_imagen}"))->fit(1200,500);
           $img->save();

           $receta->imagen = $ruta_imagen;
        }
        $receta->save();

        return redirect()->action('RecetaController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy( Receta $receta)
    {
        
        //ejecutar el policy
        $this->authorize('delete', $receta);

        $receta->delete();

        return redirect()->action('RecetaController@index');
        
    }
}
