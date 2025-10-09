<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;

$u = \App\Models\User::first();
if (! $u) {
    echo "no users\n";
    exit(1);
}

// Enable (force) two factor secret + recovery codes
$app->make(EnableTwoFactorAuthentication::class)($u, true);
$u->refresh();

// For this test environment, mark as confirmed so Fortify will trigger challenge at next login
$u->forceFill(['two_factor_confirmed_at' => now()])->save();
$u->refresh();

echo 'Enabled 2FA for user: '. $u->email . "\n";
echo 'two_factor_secret: ' . ($u->two_factor_secret ? 'SET' : 'NULL') . "\n";
echo 'two_factor_recovery_codes: ' . ($u->two_factor_recovery_codes ? 'SET' : 'NULL') . "\n";
echo 'two_factor_confirmed_at: ' . var_export($u->two_factor_confirmed_at, true) . "\n";
