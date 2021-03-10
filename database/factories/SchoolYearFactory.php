<?php

namespace Database\Factories;

use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolYearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolYear::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Le seeding se fait dans SchoolYearSeeder à partir d'un Array de valeur
        
        return [
            'name' => 'Oui',
            'ending_year' => date('Y')
        ];
    }
}
