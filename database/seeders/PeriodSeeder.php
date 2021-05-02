<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Period;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Period::create([
            'name' => 'Enero-mayo 2019',
            'start_date' => '2019-01-01',
            'end_date' => '2019-05-31'
        ]);

        Period::create([
            'name' => 'junio-noviembre 2019',
            'start_date' => '2019-06-01',
            'end_date' => '2019-11-29'
        ]);

        Period::create([
            'name' => 'Enero-mayo 2020',
            'start_date' => '2020-01-01',
            'end_date' => '2020-05-31'
        ]);

        Period::create([
            'name' => 'junio-noviembre 2020',
            'start_date' => '2020-06-01',
            'end_date' => '2020-11-29'
        ]);
    }
}
