<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // លុបទិន្នន័យចាស់ចោលសិនដើម្បីការពារកុំឱ្យជាន់គ្នា
        DB::table('communes')->delete();

        $communes = [
            // ឃុំ/សង្កាត់ របស់ខណ្ឌដូនពេញ (district_id = 1)
            ['id' => 1, 'district_id' => 1, 'name' => 'ផ្សារថ្មីទី១'],
            ['id' => 2, 'district_id' => 1, 'name' => 'ផ្សារថ្មីទី២'],
            ['id' => 3, 'district_id' => 1, 'name' => 'ផ្សារថ្មីទី៣'],
            ['id' => 4, 'district_id' => 1, 'name' => 'ចតុមុខ'],
            ['id' => 5, 'district_id' => 1, 'name' => 'ជ័យជំនះ'],

            // ឃុំ/សង្កាត់ របស់ខណ្ឌចំការមន (district_id = 2)
            ['id' => 6, 'district_id' => 2, 'name' => 'ទន្លេបាសាក់'],
            ['id' => 7, 'district_id' => 2, 'name' => 'បឹងត្របែក'],
            ['id' => 8, 'district_id' => 2, 'name' => 'ផ្សារដើមថ្កូវ'],
        ];

        DB::table('communes')->insert($communes);
    }
}