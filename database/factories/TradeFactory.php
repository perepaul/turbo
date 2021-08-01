<?php

namespace Database\Factories;

use App\Models\Trade;
use Illuminate\Database\Eloquent\Factories\Factory;

class TradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'trade_currency_id' => rand(1,10),
            'reference' => rand().rand().rand(),
            'amount' => rand(10,10000),
            'profit' => rand(10,10000),
            'is_demo' => $this->faker->randomElement(['no','yes']),
            'type' => $this->faker->randomElement(['buy','sell']),
            'status' => $this->faker->randomElement(['active','inactive'])

        ];
    }
}
