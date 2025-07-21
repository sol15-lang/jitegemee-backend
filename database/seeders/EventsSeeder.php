<?php

namespace Database\Seeders;

use App\Models\Events;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::create([
            'name'=>'Community Outreach at Northern Kenya',
            'image'=>'../../public/Images/Events/nico-smit-NFoerQuvzrs-unsplash.jpg',
            'date'=>'July 6th 2025',
            'location'=>'Northern Kenya School',
            'category'=>'Community Outreach',
        ]);
        Events::create([
            'name'=>'Graduation 2025',
            'image'=>'../../public/Images/Events/jakob-rosen-CTd5_C7p__8-unsplash.jpg',
            'date'=>'July 5th 2025',
            'location'=>'Jitegemee University',
            'category'=>'Graduation',
        ]);
        Events::create([
            'name'=>'Cultural Festival',
            'image'=>'../../public/Images/Events/wanyoike-mbugua-dsFrAJUrUuU-unsplash.jpg',
            'date'=>'July 19 2025',
            'location'=>'Jitegemee University',
            'category'=>'Social Event',
        ]);
    }
}
