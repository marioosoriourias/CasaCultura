<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeacherType;

class TeacherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherType::Create([
            'name' => 'Maestro'
        ]);

        TeacherType::Create([
            'name' => 'Becario'
        ]);

        TeacherType::Create([
            'name' => 'Servicio Social'
        ]);

        TeacherType::Create([
            'name' => 'Practicante'
        ]);
    }
}
