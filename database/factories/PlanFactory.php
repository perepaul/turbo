<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'amount' => rand(100,20000),
            'bonus' => rand(10,50),
            'demo_balance' => rand(100,20000),
            'features' => [$this->faker->sentence(),$this->faker->sentence(),$this->faker->sentence()]
        ];
    }
}
