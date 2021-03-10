<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolyears = [
            [
                'name' => 'A1',
                'ending_year' => '2025'
            ],
            [
                'name' => 'A2',
                'ending_year' => '2024'
            ],
            [
                'name' => 'A3',
                'ending_year' => '2023'
            ],
            [
                'name' => 'A4',
                'ending_year' => '2022'
            ],
            [
                'name' => 'A5',
                'ending_year' => '2021'
            ],
        ];
        foreach($schoolyears as $schoolyear) {
            SchoolYear::create($schoolyear);
        };
    }
}
