<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Period;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = ['Guitarra', 'Pintura', 'Canto', 'Escultura', 'Baile', 'Piano', 'Bateria', 'Modelaje', 'Violin', 'Computacion', 'Poesia'];
        
        foreach ($courses as $course) {
            Course::create([
                'name' => $course,
                'period_id' => Period::all()->random()->id,
                'teacher_id' => Period::all()->random()->id,
            ]);
        }

    }
}
