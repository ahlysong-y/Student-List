<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        // ប្តូរពី 'name' មកជា 'name_kh' វិញឱ្យត្រូវតាម Database របស់អ្នក
        $districts = [
            // ស្រុក/ខណ្ឌ របស់ភ្នំពេញ (province_id = 1)
            ['id' => 1, 'province_id' => 1, 'name' => 'ដូនពេញ'],
            ['id' => 2, 'province_id' => 1, 'name' => 'ចំការមន'],
            ['id' => 3, 'province_id' => 1, 'name' => '៧មករា'],
            ['id' => 4, 'province_id' => 1, 'name' => 'ទួលគោក'],
            ['id' => 5, 'province_id' => 1, 'name' => 'មានជ័យ'],
            
            // ស្រុក របស់កណ្តាល (province_id = 2)
            ['id' => 6, 'province_id' => 2, 'name' => 'តាខ្មៅ'],
            ['id' => 7, 'province_id' => 2, 'name' => 'កៀនស្វាយ'],
            ['id' => 8, 'province_id' => 2, 'name' => 'មុខកំពូល'],
            
            // ស្រុក របស់សៀមរាប (province_id = 3)
            ['id' => 9, 'province_id' => 3, 'name' => 'សៀមរាប'],
            ['id' => 10, 'province_id' => 3, 'name' => 'ពួក'],
            ['id' => 11, 'province_id' => 3, 'name' => 'សូទ្រនិគម'],
        ];

        DB::table('districts')->insert($districts);
    }
}