<?php

// ១. ទាញយក Composer Autoloader (សំខាន់បំផុតដើម្បីបំបាត់ Error មុននេះ)
require __DIR__ . '/../vendor/autoload.php';

// ២. បង្កើតឯកសារ sqlite ក្នុង /tmp បើវាមិនទាន់មាន
if (!file_exists('/tmp/database.sqlite')) {
    touch('/tmp/database.sqlite');
}

// ៣. ទាញយកឯកសារ Bootstrap របស់ Laravel
$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// ៤. រត់ Migrate ស្វ័យប្រវត្ត ប្រសិនបើមិនទាន់មាន Table "students"
try {
    if (!Illuminate\Support\Facades\Schema::hasTable('students')) {
        Illuminate\Support\Facades\Artisan::call('migrate', [
            '--force' => true,
        ]);

        // ប្រសិនបើអ្នកចង់រត់ Seeder សម្រាប់ទិន្នន័យខេត្ត អាចបើកកូដខាងក្រោមនេះបាន៖
        // Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
    }
} catch (\Exception $e) {
    // ការពារកុំឱ្យគាំងទំព័រ ប្រសិនបើមានបញ្ហាផ្នែក Database សារជាថ្មី
}

// ៥. បន្តដំណើរការ Request ទៅកាន់ទំព័រធម្មតា
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
