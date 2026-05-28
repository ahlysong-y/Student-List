<?php
require __DIR__ . "/../public/index.php";

// បង្កើតឯកសារ sqlite ក្នុង /tmp បើវាមិនទាន់មាន
if (!file_exists('/tmp/database.sqlite')) {
    touch('/tmp/database.sqlite');
}

require __DIR__ . '/../public/index.php';
