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
            if (config('database.default') === 'sqlite' && !Schema::hasTable('students')) {
                // ១. រត់បង្កើត Table ទាំងអស់ទៅក្នុង SQLite
                Artisan::call('migrate', [
                    '--force' => true,
                ]);

                // ២. បញ្ចូលទិន្នន័យខេត្ត/ក្រុងទៅក្នុង Table "provinces" ដោយស្វ័យប្រវត្ត
                if (Schema::hasTable('provinces') && DB::table('provinces')->count() == 0) {
                    $provinces = [
                        ['name' => 'ភ្នំពេញ'],
                        ['name' => 'សៀមរាប'],
                        ['name' => 'ព្រះសីហនុ'],
                        ['name' => 'បាត់ដំបង'],
                        ['name' => 'កំពង់ចាម'],
                        ['name' => 'កំពង់ធំ'],
                        ['name' => 'កំពង់ស្ពឺ'],
                        ['name' => 'កំពង់ឆ្នាំង'],
                        ['name' => 'កណ្តាល'],
                        ['name' => 'កែប'],
                        ['name' => 'កោះកុង'],
                        ['name' => 'ក្រចេះ'],
                        ['name' => 'មណ្ឌលគិរី'],
                        ['name' => 'ព្រះវិហារ'],
                        ['name' => 'ព្រៃវែង'],
                        ['name' => 'ពោធិ៍សាត់'],
                        ['name' => 'រតនគិរី'],
                        ['name' => 'ស្ទឹងត្រែង'],
                        ['name' => 'ស្វាយរៀង'],
                        ['name' => 'តាកែវ'],
                        ['name' => 'ឧត្តរមានជ័យ'],
                        ['name' => 'ប៉ៃលិន'],
                        ['name' => 'បន្ទាយមានជ័យ'],
                        ['name' => 'ត្បូងឃ្មុំ']
                    ];

                    DB::table('provinces')->insert($provinces);
                }
            }
        } catch (\Exception $e) {
            // ការពារកុំឱ្យគាំង ប្រសិនបើមានបញ្ហាផ្សេងៗ
        }
    }
}
