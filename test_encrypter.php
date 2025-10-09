<?php
require __DIR__.'/vendor/autoload.php';
use Illuminate\Foundation\Application;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Filesystem\Filesystem;

$app = new Application(__DIR__);
$app->useConfigPath(__DIR__.'/config');

// load full config repository
$config = new ConfigRepository();
foreach (glob(__DIR__.'/config/*.php') as $file) {
    $name = basename($file, '.php');
    $config->set($name, require $file);
}
$app->instance('config', $config);

// register encryption provider
$provider = new Illuminate\Encryption\EncryptionServiceProvider($app);
try {
    $provider->register();
    echo "provider.register OK\n";
    echo app()->bound('encrypter') ? "encrypter bound\n" : "encrypter NOT bound\n";
    var_export(array_keys($app->getLoadedProviders()));
} catch (Throwable $e) {
    echo "Exception: ".get_class($e)." - ".$e->getMessage()."\n";
    echo $e->getTraceAsString();
}

