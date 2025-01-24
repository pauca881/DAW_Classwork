<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\tprofesor;

class DatosprofesorSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // DB::table('users')->insert([
        //     'name' => 'Juan Pérez',
        //     'email' => 'juan.perez@example.com',
        //     'password' => bcrypt('password123'),
        //     'dni' => '12345678A',
        //     'edad' => 30,
        //     'data_naixement' => '1994-06-15',
        //     'observacions' => 'Observación de ejemplo.',
        // ]);

        // // Insertar un usuario con algunos campos en NULL
        // DB::table('users')->insert([
        //     'name' => 'Maria Gómez',
        //     'email' => null, // Campo nullable
        //     'password' => null, // Campo nullable
        //     'dni' => null, // Campo nullable
        //     'edad' => null, // Campo nullable
        //     'data_naixement' => null, // Campo nullable
        //     'observacions' => null, // Campo nullable
        // ]);
        Schema::disableForeignKeyConstraints();
        tprofesor::truncate();
        tprofesor::factory(50)->create();
        Schema::enableForeignKeyConstraints();
        tprofesor::factory(50)->create();


    }
}
