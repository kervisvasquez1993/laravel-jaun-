<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //campos que se agregaran
    protected $fillable = [
        'titulo', 'ingredientes', 'preparacion','imagen', 'categoria_id'
    ];
    // hasOne
    // hasMany
    //belongsToMany
        /**------- */

        // relacion inversa 
    // belongsTo
    // belognsTo
    // belongsToMany



    //obtiee la categoria de la receta via llave foranea

    public function categoria()
    {
        return $this->belongsTo(CategoriaRecetas::class);
    }

    // obtiene la informacion del usuario via fk

    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id'); // fk de la tabla
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'like_receta');
    }
}
