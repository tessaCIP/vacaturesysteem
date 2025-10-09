<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
try {
    $bound = $app->bound('encrypter') ? 'bound' : 'not bound';
    echo "encrypter: $bound\n";
    $providers = array_keys($app->getLoadedProviders());
    echo "Loaded providers:\n";
    foreach ($providers as $p) echo " - $p\n";
} catch (Throwable $e) {
    $msg = 'Error: '.get_class($e)." - " . $e->getMessage() . "\n" . $e->getTraceAsString();
    file_put_contents(__DIR__.'/diagnostics.log', $msg);
    echo "Diagnostics wrote diagnostics.log\n";
}
