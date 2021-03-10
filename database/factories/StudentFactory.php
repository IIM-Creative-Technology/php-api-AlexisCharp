<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /**
         * @var Collection $school_year
         */
        $school_year = DB::table('school_years')->select('id')->inRandomOrder()->limit(1)->get();

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'age' => random_int(18, 25),
            // Ici, l'année d'entrée peut-être incohérente avec la promotion
            'starting_year' => strval(random_int(2015, 2021)),
            'school_year_id' => $school_year[0]->id,
        ];
    }
}
