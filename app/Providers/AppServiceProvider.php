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
            // ១. រត់បង្កើត Table ទាំងអស់ ប្រសិនបើមិនទាន់មាន
            if (config('database.default') === 'sqlite' && !Schema::hasTable('students')) {
                Artisan::call('migrate', [
                    '--force' => true,
                ]);
            }

            // ២. ពិនិត្យមើលថាតើ Table provinces នៅទទេមែនទេ? បើទទេ ឱ្យវាទាញទិន្នន័យពី SQL មកបញ្ចូល
            if (Schema::hasTable('provinces') && DB::table('provinces')->count() == 0) {

                // ផ្លូវទៅកាន់ឯកសារ SQL របស់អ្នក (ឧទាហរណ៍៖ ដាក់ក្នុង folder database)
                $sqlPath = database_path('cambodia_geometry.sql');

                if (file_exists($sqlPath)) {
                    // អានកូដ SQL រួចរត់ដំឡើងចូល Database ទាំងអស់តែម្តង
                    DB::unprepared(file_get_contents($sqlPath));
                }
            }
        } catch (\Exception $e) {
            // ការពារកុំឱ្យគាំងប្រព័ន្ធ
        }
    }
}
