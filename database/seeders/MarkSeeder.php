<?php

namespace Database\Seeders;

use App\Models\Mark;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pour l'ensemble des matières, on va générer des notes pour tous les étudiants qui ont suivi le cours
        for ($i = 1; $i <= 30; $i++) {
            $school_year = DB::table('subjects')->select('school_year_id')->where('id', $i)->limit(1)->get();
            $students = DB::table('students')->select('id')->where('school_year_id', $school_year[0]->school_year_id)->get();
            foreach ($students as $student) {
                $seed = [
                    'value' => random_int(0,20),
                    'subject_id' => $i,
                    'student_id' => $student->id,
                ];
                Mark::create($seed);
            };
        }
    }
}
