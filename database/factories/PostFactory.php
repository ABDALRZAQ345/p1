<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title'=> fake()->name(),
            'description'=>fake()->text(),
         'user_id'=> User::factory()->create(),
'company_id' =>Company::factory()->create(),
            'logo'=>"logos/Untitled.png"
        ];
    }
}
