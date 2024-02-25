<?php

namespace Database\Factories;

use App\Models\FreedomRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreedomRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FreedomRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'iin' => $this->faker->text,
        'mobile_phone' => $this->faker->text,
        'verification_sms_code' => $this->faker->text,
        'email' => $this->faker->text,
        'product' => $this->faker->text,
        'period' => $this->faker->text,
        'principal' => $this->faker->text,
        'uuid' => $this->faker->text,
        'is_success' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
