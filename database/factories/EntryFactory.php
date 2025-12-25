<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Create new user for each entries
            //
            'local_id' => $this->faker->unique()->regexify('[A-Z]{4}[0-9]{2}'),
            'vendor_name' => $this->faker->company(),
            'vendor_desc' => $this->faker->paragraph(2, false),
            'v_email' => $this->faker->safeEmail(),
            'v_website' => $this->faker->url(),
            'v_country' => $this->faker->country(),
            'v_city' => $this->faker->city(),
            'v_address' => $this->faker->address(),
            'organisation_type' => $this->faker->randomElement([
                'corporation',
                'proprietorship',
                'partnership'
            ]),
            'employee_num' => $this->faker->numberBetween(10, 1000),
            'business_type' => $this->faker->randomElements(
                [
                    'manufacturer',
                    'inf_services',
                    'retail',
                    'trading',
                    'consultancy',
                    'web_dev',
                    'other',
                ],
                $this->faker->numberBetween(1, 3),
            )
        ];
    }
}
