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

        $representante->estudiantes()->attach($estudiante);

        DB::table('users')->insert([
            'name' => 'Tamara Cruz',
            'email'=>'tamara.cruz@gmail.com',
            'password'=>bcrypt('123')
        ]);

        $estudiante2 = Estudiante::create([
            'cedula' => '1302456897',
            'nombres' => 'Tamara',
            'apellidopaterno' =>'Cruz',
            'apellidomaterno' => 'Gomez',
            'curso_id' => 1,
            'email' => 'tamara.cruz@gmail.com',
            'nacimiento' => '1991-11-10',
            'telefono' => '042662195',
            'updatedbyuser' => 'seed',
            'estado' => 'A'
        ]);
        $representante->estudiantes()->attach($estudiante2);
////////////////////////////////////////////////////////////////////////////

    $representante2 = Representante::create([
        'nombres'=>'Andy Anthony',
        'apellidos'=>'Johnson Malone',
        'cedula'=>'0928245123',
        'telefono'=> '042662195',
        'email'=>'andy.johnson@hotmail.com',
        'nacimiento'=>'1988-10-30',
        'updatedbyuser'=>'seed',
    ]);

    DB::table('users')->insert([
        'name'=>'Andy Johnson',
        'email'=>'andy.johnson@hotmail.com',
        'password' => bcrypt('123'),
        'tipo_entidad' => 'R',
        'entidad_id' => $representante2->id
    ]);

    $estudiante3 = Estudiante::create([
        'cedula'=>'0925895242',
        'nombres'=>'Betsy Carolina',
        'apellidopaterno'=>'Guamanquispe',
        'apellidomaterno'=>'Crespo',
        'curso_id'=>1,
        'email'=>'betsy.carolina@gmail.com',
        'nacimiento'=>'1990-12-10',
        'telefono'=>'042662195',
        'updatedbyuser'=>'seed',
        'estado'=>'A'
    ]);

    DB::table('users')->insert([
        'name'=>'Betsy Carolina Crespo',
        'email'=>'betsy.carolina@hotmail.com',
        'password' => bcrypt('123'),
        'tipo_entidad' => 'E',
        'entidad_id' => $estudiante3->id
    ]);

    $representante2->estudiantes()->attach($estudiante3);

    }
}
