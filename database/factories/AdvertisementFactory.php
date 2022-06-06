<?php

namespace Database\Factories;

use App\Helpers\Constant;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'   => Category::factory()->create()->id,
            'user_id'       => User::factory()->create()->id,
            'type'          => Constant::ADVERTISEMENT_TYPE['Free'],
            'title'         => $this->faker->title,
            'description'   => $this->faker->text,
            'start_date'    => $this->faker->date,
        ];
    }
}
