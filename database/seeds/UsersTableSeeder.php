<?php

use Illuminate\Database\Seeder;
use notascole\Representante;
use notascole\Estudiante;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Darling Chávez',
            'email'=>'darling.chavez@hotmail.com',
            'password' => bcrypt('123'),
            'tipo_entidad' => 'R',
            'entidad_id' => 1
        ]);

        $representante = Representante::create([
            'nombres'=>'Darling Rubén',
            'apellidos'=>'Chávez Quinde',
            'cedula'=>'0926899212',
            'telefono'=> '042662195',
            'email'=>'darling.chavez@hotmail.com',
            'nacimiento'=>'1988-10-30',
            'updatedbyuser'=>'seed',
        ]);

        $estudiante = Estudiante::create([
            'cedula'=>'1302458975',
            'nombres'=>'Kelly',
            'apellidopaterno'=>'Campoverde',
            'apellidomaterno'=>'Montenegro',
            'curso_id'=>1,
            'email'=>'kelly.campoverde@gmail.com',
            'nacimiento'=>'1990-12-10',
            'telefono'=>'042662195',
            'updatedbyuser'=>'seed',
            'estado'=>'A'
        ]);

        DB::table('users')->insert([
            'name'=>'Kelly Campoverde Montenegro',
            'email'=>'kelly.campoverde@hotmail.com',
            'password' => bcrypt('123'),
            'tipo_entidad' => 'E',
            'entidad_id' => 1
        ]);

        $representante->representados()->attach($estudiante);
    }
}
