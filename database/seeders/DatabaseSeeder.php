<?php

namespace Database\Seeders;

use App\Models\Mark;
use App\Models\Professor;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Make a php artisan migrate:fresh before seeding because there is no truncate in the function :)

        $this->call(UserSeeder::class);
        $this->call(SchoolYearSeeder::class);
        Professor::factory(25)->create();
        Subject::factory(30)->create();
        Student::factory(200)->create();
        $this->call(MarkSeeder::class);
    }
}
