<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = \App\Models\User::whereNotNull('two_factor_secret')
    ->whereNotNull('two_factor_confirmed_at')
    ->get();

if ($users->isEmpty()) {
    echo "Geen users met 2FA gevonden.\n";
    exit;
}

foreach ($users as $u) {
    echo 'id: ' . $u->id . ' | email: ' . $u->email . "\n";
}
