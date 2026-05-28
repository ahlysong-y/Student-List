<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            ['id' => 1, 'name' => 'ភ្នំពេញ'],
            ['id' => 2, 'name' => 'កណ្តាល'],
            ['id' => 3, 'name' => 'សៀមរាប'],
            ['id' => 4, 'name' => 'ព្រះសីហនុ'],
            ['id' => 5, 'name' => 'បាត់ដំបង'],
            ['id' => 6, 'name' => 'កំពង់ចាម'],
            ['id' => 7, 'name' => 'កំពង់ធំ'],
            ['id' => 8, 'name' => 'កំពង់ស្ពឺ'],
            ['id' => 9, 'name' => 'កំពង់ឆ្នាំង'],
            ['id' => 10, 'name' => 'កំពត'],
            ['id' => 11, 'name' => 'កែប'],
            ['id' => 12, 'name' => 'កោះកុង'],
            ['id' => 13, 'name' => 'ក្រចេះ'],
            ['id' => 14, 'name' => 'តាកែវ'],
            ['id' => 15, 'name' => 'ត្បូងឃ្មុំ'],
            ['id' => 16, 'name' => 'បន្ទាយមានជ័យ'],
            ['id' => 17, 'name' => 'ប៉ៃលិន'],
            ['id' => 18, 'name' => 'ពោធិ៍សាត់'],
            ['id' => 19, 'name' => 'ព្រះវិហារ'],
            ['id' => 20, 'name' => 'ព្រៃវែង'],
            ['id' => 21, 'name' => 'មណ្ឌលគិរី'],
            ['id' => 22, 'name' => 'រតនគិរី'],
            ['id' => 23, 'name' => 'ស្វាយរៀង'],
            ['id' => 24, 'name' => 'ស្ទឹងត្រែង'],
            ['id' => 25, 'name' => 'ឧត្តរមានជ័យ'],
        ];

        DB::table('provinces')->insert($provinces);
    }
}
