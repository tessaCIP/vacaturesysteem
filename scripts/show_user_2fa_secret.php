<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Laravel\Fortify\Fortify;
use Laravel\Fortify\TwoFactorAuthenticationProvider;

$user = \App\Models\User::first();
if (! $user) {
    echo "no users\n";
    exit(1);
}
if (! $user->two_factor_secret) {
    echo "User has no 2FA secret. Run enable_user_2fa.php first.\n";
    exit(1);
}
$decrypted = Fortify::currentEncrypter()->decrypt($user->two_factor_secret);
echo "2FA secret: $decrypted\n";

// QR code URL (compatible with Google Authenticator)
$provider = $app->make(TwoFactorAuthenticationProvider::class);
$qrUrl = $provider->qrCodeUrl(config('app.name', 'Laravel'), $user->email, $decrypted);
echo "Scan deze QR-URL in je authenticator-app:\n$qrUrl\n";
