<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Бизнес-класс', 'Эконом-класс', 'Премиум-класс'];
        for ($i = 0; $i <=2; $i++) {
            CarClass::factory()
                ->create(['name' => $values[$i]]);
        }

    }
}
