<?php

// 1. ទាញយក Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 2. បង្កើតឯកសារ sqlite ក្នុង /tmp បើវាមិនទាន់មាន
if (!file_exists('/tmp/database.sqlite')) {
    touch('/tmp/database.sqlite');
}

// 3. ដំណើរការទៅកាន់ទំព័រធម្មតា
require __DIR__ . '/../public/index.php';
