<?php

use Illuminate\Database\Seeder;

class usuarios_iniciales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
          'id' => null,
          'rol' => 'admin',
          'username' => 'lagger',
          'name' => 'laura',
          'surname' => 'noot',
          'email' => 'noot@mukito.com',
          'password' => Hash::make('hidratate'),
          'avatar' => null
        ]);
    }
}
