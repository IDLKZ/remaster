<?php

namespace Database\Factories;

use App\Models\FreedomResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreedomResponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FreedomResponse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data' => $this->faker->text,
        'success' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
