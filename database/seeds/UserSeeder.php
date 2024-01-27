<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'alexsantm@gmail.comD',
            'password' => bcrypt('password'), // Se encripta la contraseña
        ]);
    }
}
