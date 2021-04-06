<?php

use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Usuarios;
        $user->name = 'Theizer';
        $user->username = 'tgonzalez';
        $user->last_name = 'Gonzalez';
        $user->email = 'tgonzalez@gmail.com';
        $user->password = 'admin';
        $user->status = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Administrador');


        $user = new Usuarios;
        $user->name = 'Michael';
        $user->username = 'mpaez';
        $user->last_name = 'Páez';
        $user->email = 'mpaez@mmmvenezuela.com';
        $user->password = 'admin';
        $user->status = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Usuario');

    }
}
