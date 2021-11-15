<?php

namespace Database\Factories;

use App\Models\Diary;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1, 12),
            'service_id' => $this->faker->numberBetween(1, 8),
            'date' => $this->faker->unique()->dateTimeBetween('-3 days', '+ 7 days', $timezone =  'America/Sao_Paulo'),
            //dateTimeInInterval($startDate ='-3 days', $interval = '+ 7 days', $timezone =  'America/Sao_Paulo'),
            'hour' => $this->faker->numberBetween(9, 19),
            'status' => TRUE,
            'observations' => $this->faker->paragraph(rand(3, 6))
        ];
    }
}
