<?php

namespace Database\Factories;

use App\Models\FreedomToken;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreedomTokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FreedomToken::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'refresh_token' => $this->faker->text,
        'access_token' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
