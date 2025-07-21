<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'name'=>'School of Computing and Engineering',
            'address'=>'Central Building',
            'phone'=>'254712345678'
        ]);
        School::create([
            'name'=>'School of Medicine and Surgery',
            'address'=>'Central Building',
            'phone'=>'254712345678'
        ]);
        School::create([
            'name'=>'Institute of Mathematics',
            'address'=>'Central Building',
            'phone'=>'254712345678'
        ]);
        School::create([
            'name'=>'School of Humanities and Social Sciences',
            'address'=>'Oval Building',
            'phone'=>'254712345678'
        ]);
        School::create([
            'name'=>'School of Hospitality and Tourism',
            'address'=>'Management Science Building',
            'phone'=>'254712345678'
        ]);
        School::create([
            'name'=>'Law School',
            'address'=>'Sir Thomas Moore Building',
            'phone'=>'254712345678'
        ]);
    }
}
