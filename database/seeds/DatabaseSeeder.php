<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'anhiolectivos',
            'asignatura_curso',
            'cursos',
            'asignaturas',
            'estudiante_representante',
            'estudiantes',
            'representantes',
            'profesores',
            'password_resets'
        ]);

        $this->call(AnhioLectivoSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(AsignaturasSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CalificacionesSeeder::class);
    }

    private function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }


}
