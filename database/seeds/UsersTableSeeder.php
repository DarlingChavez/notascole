<?php

use Illuminate\Database\Seeder;

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
        ]);
    }
}
