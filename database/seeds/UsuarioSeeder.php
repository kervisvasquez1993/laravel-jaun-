<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'kervis vasquez',
            'email' => 'kervisvasquez24@gmail.com',
            'password' =>Hash::make("Kervisvasquez1993"),
            'url' => 'http://kervisvasquez.online',
        ]);
       
        
        
        $user2 = User::create([
            'name' => 'prueba',
            'email' => 'prueba@gmail.com',
            'password' =>Hash::make("Kervisvasquez1993"),
            'url' => 'http://kervisvasquez.online',
        ]);
       
       
    }
}
