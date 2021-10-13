<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['2.0 MPI / 150 л.c. / Бензин', '2.0 MPI / 150 л.c. / Дизель', '2.5 MPI / 180 л.c. / Бензин',
            '3.0 MPI / 250 л.c. / Дизель', '1.6 MPI / 100 л.c. / Бензин', '1.6 MPI / 100 л.c. / Дизель'
        ];
        for ($i = 0; $i <= 5; $i++) {
            CarEngine::factory()
                ->create(['name' => $values[$i]]);
        }

    }
}
