<?php

namespace Database\Factories;

use App\Models\Number;
use App\Models\NumberList;
use Illuminate\Database\Eloquent\Factories\Factory;

class NumberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Number::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_list_id' => NumberList::factory(),
            'number' =>  $this->faker->phoneNumber,
        ];
    }
}
