<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\TeacherType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $phone = $this->faker->unique()->e164PhoneNumber;
        $phone = substr($phone, 1);

        return [
            'name' => $this->faker->name,
            'age'=> $this->faker->numberBetween(8, 50),
            'gender' => $this->faker->randomElement([Teacher::F, Teacher::M]), 
            'phone' => $phone,
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'teacher_type_id' => TeacherType::all()->random()->id,
        ];
    }
}
