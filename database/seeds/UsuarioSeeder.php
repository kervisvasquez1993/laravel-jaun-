<?php

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
        DB::table('users')->insert([
            'name' => 'kervis vasquez',
            'email' => 'kervisvasquez24@gmail.com',
            'password' =>Hash::make("Kervisvasquez1993"),
            'url' => 'http://kervisvasquez.online',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'antonio vasquez',
            'email' => 'kvfa13@gmail.com',
            'password' =>Hash::make("Kervisvasquez1993"),
            'url' => 'http://kervisvasquez.online',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
