<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

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
        // រត់ Migrate ស្វ័យប្រវត្តនៅលើ Vercel ប្រសិនបើគ្មាន Table "students"
        try {
            if (config('database.default') === 'sqlite' && !Schema::hasTable('students')) {
                Artisan::call('migrate', [
                    '--force' => true,
                ]);
            }
        } catch (\Exception $e) {
            // ការពារកុំឱ្យគាំង ប្រសិនបើមានបញ្ហាផ្សេងៗ
        }
    }
}
