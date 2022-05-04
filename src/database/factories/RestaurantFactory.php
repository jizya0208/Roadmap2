<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurant;
// use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            // 'カラム名' => 設定したい値,
            'name' =>  $this->faker->company,
            'address' => $this->faker->address,
            'description' => $this->faker->text,
            'image_id' => 'no-image.png',
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
        ];
    }
}