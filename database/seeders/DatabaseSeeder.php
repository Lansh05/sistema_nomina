<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use App\Models\Captura;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //USER
        User::create(array(
            'id' => 1,
            'user' => 'admin',
            'password' => bcrypt('123456'),
            'nombre' => 'Administrador root',
            'email' => 'admin@gmail.com',
        ));

        Concepto::create(array(
            'id' => 1,
            'descripcion' => 'Retraso',
        ));

        Concepto::create(array(
            'id' => 1,
            'descripcion' => 'Puntual',
        ));

        Concepto::create(array(
            'id' => 1,
            'descripcion' => 'Falta',
        ));

    }
}
