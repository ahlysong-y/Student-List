<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // បិទការពិនិត្យ Foreign Key ជាបណ្តោះអាសន្ន ដើម្បីកុំឱ្យទើសទាក់ទិន្នន័យចាស់-ថ្មី។
        DB::statement('PRAGMA foreign_keys = OFF;');

        // សម្អាតទិន្នន័យចាស់ចោល
        DB::table('villages')->delete();

        $villages = [
            // ភូមិ របស់សង្កាត់ចតុមុខ (commune_id = 4)
            ['id' => 1, 'commune_id' => 4, 'name' => 'ភូមិ១'],
            ['id' => 2, 'commune_id' => 4, 'name' => 'ភូមិ២'],
            ['id' => 3, 'commune_id' => 4, 'name' => 'ភូមិ៣'],

            // ភូមិ របស់សង្កាត់ទន្លេបាសាក់ (commune_id = 6)
            ['id' => 4, 'commune_id' => 6, 'name' => 'ភូមិទន្លេបាសាក់'],
            ['id' => 5, 'commune_id' => 6, 'name' => 'ភូមិក្បាលទំនប់'],
        ];

        DB::table('villages')->insert($villages);

        // បើកការពិនិត្យ Foreign Key ឡើងវិញ
        DB::statement('PRAGMA foreign_keys = ON;');
    }
}
