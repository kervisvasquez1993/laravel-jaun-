<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements  MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     //esto es lo que se ingresa manuel a la base de datos
    protected $fillable = [
        'name', 'email', 'password','url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     // evento que se ejecuta cuando un usuario es creado

     protected static function boot()
     {
         parent::boot();
         // asignar pefil una vez se haya creado

         static::created(function($user)
         {
            $user->perfil()->create();
         });
     }
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**relacion de 1:n de usuarios de recetas */
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }

    /* relacion de uno a uno de perfil y user  */

    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    // recetas que usuarios le a dado me gusta
    public function meGusta()
    {
        return $this->belongsToMany(Receta::class, 'like_receta');
    }

}
