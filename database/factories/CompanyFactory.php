<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $name = $this->faker->company;
        } while (Company::query()->where('name', $name)->exists());

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
