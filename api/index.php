<?php

// 1. បង្កើតឯកសារ sqlite ក្នុង /tmp បើវាមិនទាន់មាន
if (!file_exists('/tmp/database.sqlite')) {
    touch('/tmp/database.sqlite');
}

// 2. ទាញយកឯកសារ Bootstrap របស់ Laravel មកទុកក្នុង Variable ដើម្បីប្រើប្រាស់ Artisan
$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// 3. បង្កើតសេវាកម្មសាកល្បង៖ ប្រសិនបើ Table "students" មិនទាន់មាន ឱ្យវារត់ Migrate ភ្លាម
try {
    if (!Illuminate\Support\Facades\Schema::hasTable('students')) {
        Illuminate\Support\Facades\Artisan::call('migrate', [
            '--force' => true,
        ]);

        // ប្រសិនបើអ្នកមានទិន្នន័យទំព័រខេត្ត (Provinces Seeder) អាចបើកកូដខាងក្រោមនេះបាន
        // Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
    }
} catch (\Exception $e) {
    // ការពារកុំឱ្យគាំងទំព័រ ប្រសិនបើមានបញ្ហាផ្នែក Database សារជាថ្មី
}

// 4. បន្តដំណើរការ Request ទៅកាន់ទំព័រធម្មតា
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
