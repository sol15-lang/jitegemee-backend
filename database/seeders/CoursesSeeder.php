<?php

namespace Database\Seeders;

use App\Models\Courses;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courses::create([
            'name'=>'Computer Science',
            'school_id'=>1,
            'description'=>'Best course for computer enthusiasts',
            'intake'=>'July 2025',
        ]);
        Courses::create([
            'name'=>'Medicine',
            'school_id'=>1,
            'description'=>'Best course for learning about the human body',
            'intake'=>'September 2025',
        ]);
        Courses::create([
            'name'=>'Data science',
            'school_id'=>1,
            'description'=>'Make data make sense',
            'intake'=>'July 2025',
        ]);
        Courses::create([
            'name'=>'Mechanical Engineering',
            'school_id'=>1,
            'description'=>'Best course for machinery',
            'intake'=>'July 2025',
        ]);
        Courses::create([
            'name'=>'Buisnes and IT',
            'school_id'=>1,
            'description'=>'How to combine IT in Business',
            'intake'=>'April 2026',
        ]);
        Courses::create([
            'name'=>'Architecture',
            'school_id'=>1,
            'description'=>'Learn to design the best architecture',
            'intake'=>'July 2025',
        ]);
        Courses::create([
            'name'=>'Communication',
            'school_id'=>1,
            'description'=>'Learn to be a good communicator',
            'intake'=>'July 2025',
        ]);
        Courses::create([
            'name'=>'Hospitality and Tourism',
            'school_id'=>1,
            'description'=>'Service industry made better',
            'intake'=>'September 2025',
        ]);
         Courses::create([
            'name'=>'Financial Engineering',
            'school_id'=>1,
            'description'=>'Best for finance enthusiasts',
            'intake'=>'July 2025',
        ]);
         Courses::create([
            'name'=>'Law',
            'school_id'=>1,
            'description'=>'Make law make sense',
            'intake'=>'April 2026',
        ]);
    }
}
