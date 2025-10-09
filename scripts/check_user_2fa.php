<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$u = \App\Models\User::first();
if (! $u) {
    echo "no users\n";
    exit;
}

echo 'id: ' . $u->id . ' email: ' . $u->email . "\n";
echo 'two_factor_secret: ' . var_export($u->two_factor_secret, true) . "\n";
echo 'two_factor_recovery_codes: ' . var_export($u->two_factor_recovery_codes, true) . "\n";
echo 'two_factor_confirmed_at: ' . var_export($u->two_factor_confirmed_at, true) . "\n";
