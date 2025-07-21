<?php

namespace Database\Seeders;

use App\Models\Library;

use Illuminate\Database\Console\Seeds\WithoutModelLibrary;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Library::create([
            'title'=>'Introduction to Algorithms',
            'image'=>'public/Images/Libraray/images.jpeg',
            'description'=>'A good place to start on algorithms.',
        ]);
        Library::create([
            'title'=>'Architecture,Form,Space & Order',
            'image'=>'public/Images/Libraray/703519.jpg',
            'description'=>'A good book on Architecture and the order it brings.',
        ]);
        Library::create([
            'title'=>'Shigley s Mechanical Engineering Design',
            'image'=>'public/Images/Libraray/images (1).jpeg',
            'description'=>'A good book on mechanical engineering design.',
        ]);
    }
}
