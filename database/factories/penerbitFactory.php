<?php

namespace Database\Factories;

use App\Models\penerbit;
use Illuminate\Database\Eloquent\Factories\Factory;

class penerbitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = penerbit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nm_penerbit' => $this->faker->firstName(),
        ];
    }
}
