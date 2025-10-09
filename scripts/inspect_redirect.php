<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $r = $app->make(\Laravel\Fortify\Contracts\RedirectsIfTwoFactorAuthenticatable::class);
    echo 'resolved: '.get_class($r)."\n";
    $ref = new ReflectionClass($r);
    if ($ref->hasProperty('guard')) {
        $prop = $ref->getProperty('guard');
        $prop->setAccessible(true);
        $guard = $prop->getValue($r);
        echo 'guard is: ' . (is_object($guard) ? get_class($guard) : var_export($guard, true)) . "\n";
        if (is_object($guard) && method_exists($guard, 'getProvider')) {
            $provider = $guard->getProvider();
            echo 'provider is: '. (is_object($provider) ? get_class($provider) : var_export($provider, true)) . "\n";
        } else {
            echo 'guard has no getProvider method or guard is not object'."\n";
        }
    }
} catch (Throwable $e) {
    echo get_class($e).': '.$e->getMessage()."\n".$e->getTraceAsString();
}
