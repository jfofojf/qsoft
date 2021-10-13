<?php

namespace Database\Seeders;

use App\Models\CarBody;
use Illuminate\Database\Seeder;

class CarBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Седан', 'Родстер', 'Купе', 'Хэчбэк', 'Универсал', 'Кроссовер', 'Пикап', 'Рамный'];
        for ($i = 0; $i <= 7; $i++) {
            CarBody::factory()
                ->create(['name' => $values[$i]]);
        }
    }
}
