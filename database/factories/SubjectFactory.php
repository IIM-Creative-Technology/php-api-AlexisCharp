<?php

namespace Database\Factories;

use App\Models\Subject;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $school_year = DB::table('school_years')->select('id')->inRandomOrder()->limit(1)->get();
        $professor = DB::table('professors')->select('id')->inRandomOrder()->limit(1)->get();

        $startingDate = $this->faker->dateTimeBetween('- 5 years', '+ 1 year');
        $date = new DateTime($startingDate->format('Y-m-d'));
        $endingDate = $date->modify('+' . random_int(1,5) . ' days');

        return [
            'name' => $this->faker->sentence(3),
            'starting_day' => $startingDate,
            'ending_day' => $endingDate,
            'school_year_id' => $school_year[0]->id,
            'professor_id' => $professor[0]->id,
        ];
    }
}
