<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Druggr>
 */
class DruggrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Druggr::class;
    public function definition(): array
    {
        $randomId = $this->faker->unique()->regexify('[A-Z0-9]{5}');
        return [
            'id' => $randomId,
            'Tennhom' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
