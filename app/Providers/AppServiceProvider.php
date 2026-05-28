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
     */ public function boot(): void
    {
        // រត់ Migrate និង Seed ស្វ័យប្រវត្តនៅលើ Vercel
        try {
            if (config('database.default') === 'sqlite' && !Schema::hasTable('students')) {
                // ១. រត់បង្កើត Table ទាំងអស់
                Artisan::call('migrate', [
                    '--force' => true,
                ]);

                // ២. រត់បញ្ចូលទិន្នន័យខេត្ត/ក្រុង (ដោះខមិនជួរកូដខាងក្រោមនេះ)
                Artisan::call('db:seed', [
                    '--force' => true,
                ]);
            }
        } catch (\Exception $e) {
            // ការពារកុំឱ្យគាំង ប្រសិនបើមានបញ្ហាផ្សេងៗ
        }
    }
}
