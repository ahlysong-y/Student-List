<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            // ១. ពិនិត្យ និងរត់បង្កើត Table ទាំងអស់ជាមុនសិន ប្រសិនបើមិនទាន់មាន Table "students"
            if (config('database.default') === 'sqlite' && !Schema::hasTable('students')) {
                Artisan::call('migrate', [
                    '--force' => true,
                ]);
            }

            // ២. បញ្ចូលទិន្នន័យគ្រប់ ២៥ ខេត្ត/ក្រុង
            if (Schema::hasTable('provinces') && DB::table('provinces')->count() == 0) {
                $provinces = [
                    ['id' => 1, 'name' => 'ភ្នំពេញ'],
                    ['id' => 2, 'name' => 'កណ្តាល'],
                    ['id' => 3, 'name' => 'សៀមរាប'],
                    ['id' => 4, 'name' => 'បាត់ដំបង'],
                    ['id' => 5, 'name' => 'ព្រះសីហនុ'],
                    ['id' => 6, 'name' => 'កំពង់ចាម'],
                    ['id' => 7, 'name' => 'កំពង់ធំ'],
                    ['id' => 8, 'name' => 'កំពង់ស្ពឺ'],
                    ['id' => 9, 'name' => 'កំពង់ឆ្នាំង'],
                    ['id' => 10, 'name' => 'បន្ទាយមានជ័យ'],
                    ['id' => 11, 'name' => 'ស្វាយរៀង'],
                    ['id' => 12, 'name' => 'ព្រៃវែង'],
                    ['id' => 13, 'name' => 'តាកែវ'],
                    ['id' => 14, 'name' => 'ពោធិ៍សាត់'],
                    ['id' => 15, 'name' => 'ក្រចេះ'],
                    ['id' => 16, 'name' => 'ស្ទឹងត្រែង'],
                    ['id' => 17, 'name' => 'មណ្ឌលគិរី'],
                    ['id' => 18, 'name' => 'រតនគិរី'],
                    ['id' => 19, 'name' => 'ព្រះវិហារ'],
                    ['id' => 20, 'name' => 'កោះកុង'],
                    ['id' => 21, 'name' => 'ឧត្តរមានជ័យ'], // <-- លេខសម្គាល់គឺ ២១
                    ['id' => 22, 'name' => 'ប៉ៃលិន'],
                    ['id' => 23, 'name' => 'កែប'],
                    ['id' => 24, 'name' => 'ត្បូងឃ្មុំ']
                ];
                DB::table('provinces')->insert($provinces);
            }

            // ៣. បញ្ចូលទិន្នន័យស្រុក/ខណ្ឌគំរូ (បានថែមក្រុងសំរោង និងស្រុកអន្លង់វែង)
            if (Schema::hasTable('districts') && DB::table('districts')->count() == 0) {
                $districts = [
                    ['id' => 1, 'province_id' => 1, 'name' => 'ខណ្ឌដូនពេញ'],
                    ['id' => 2, 'province_id' => 1, 'name' => 'ខណ្ឌចំការមន'],
                    ['id' => 3, 'province_id' => 3, 'name' => 'ក្រុងសៀមរាប'],
                    ['id' => 4, 'province_id' => 4, 'name' => 'ក្រុងបាត់ដំបង'],

                    // ថែមស្រុករបស់ខេត្តឧត្តរមានជ័យ (province_id => 21)
                    ['id' => 5, 'province_id' => 21, 'name' => 'ក្រុងសំរោង'],
                    ['id' => 6, 'province_id' => 21, 'name' => 'ស្រុកអន្លង់វែង']
                ];
                DB::table('districts')->insert($districts);
            }

            // ៤. បញ្ចូលទិន្នន័យឃុំ/សង្កាត់គំរូ (បានថែមកូដសង្កាត់សំរោង និងឃុំអន្លង់វែង)
            if (Schema::hasTable('communes') && DB::table('communes')->count() == 0) {
                $communes = [
                    ['id' => 1, 'district_id' => 1, 'name' => 'សង្កាត់ផ្សារថ្មីទី១'],
                    ['id' => 2, 'district_id' => 3, 'name' => 'សង្កាត់ស្វាយដង្គំ'],
                    ['id' => 3, 'district_id' => 4, 'name' => 'សង្កាត់ស្វាយប៉ោ'],

                    // ថែមឃុំទៅតាម id របស់ស្រុកមុននេះ (ក្រុងសំរោង id=5, អន្លង់វែង id=6)
                    ['id' => 4, 'district_id' => 5, 'name' => 'សង្កាត់សំរោង'],
                    ['id' => 5, 'district_id' => 6, 'name' => 'ឃុំអន្លង់វែង']
                ];
                DB::table('communes')->insert($communes);
            }

            // ៥. បញ្ចូលទិន្នន័យភូមិគំរូ
            if (Schema::hasTable('villages') && DB::table('villages')->count() == 0) {
                $villages = [
                    ['id' => 1, 'commune_id' => 1, 'name' => 'ភូមិ១'],
                    ['id' => 2, 'commune_id' => 2, 'name' => 'ភូមិមណ្ឌល១'],
                    ['id' => 3, 'commune_id' => 3, 'name' => 'ភូមិកម្មករ'],

                    // ថែមភូមិទៅតាម id របស់ឃុំមុននេះ (សង្កាត់សំរោង id=4, ឃុំអន្លង់វែង id=5)
                    ['id' => 4, 'commune_id' => 4, 'name' => 'ភូមិបុរីរដ្ឋបាល'],
                    ['id' => 5, 'commune_id' => 5, 'name' => 'ភូមិអន្លង់វែងកណ្តាល']
                ];
                DB::table('villages')->insert($villages);
            }
        } catch (\Exception $e) {
            // ការពារកុំឱ្យគាំងប្រព័ន្ធ
        }
    }
}
