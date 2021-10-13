<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['passenger' => 'Легковые', 'offroad' => 'Внедорожники', 'rare' => 'Раритетные', 'sale' => 'Распродажа', 'new' => 'Новинки'];

        $subNames = [
            'sedans' => 'Седаны',
            'hatchbacks' => 'Хэтчбэки',
            'stations' => 'Универсалы',
            'coupes' => 'Купе',
            'roadster' => 'Родстеры',
             'hard' => 'Рамные',
            'pickup' => 'Пикапы',
            'crossover' => 'Кроссоверы',
        ];

        foreach ($names as $key => $value) {
            Catergory::factory()
                ->state(new Sequence(
                    fn () => [
                        'name' => $value,
                        'slug' => $key,
                        'sort' => 0,
                    ]
                ))
                ->create();
        }
        foreach ($subNames as $value) {
            Catergory::factory()
                ->state(new Sequence(
                    fn () => [
                        'name' => $value,
                        'slug' => $key,
                        'sort' => 1,
                    ]
                ))
                ->create();
        }
    }
}
