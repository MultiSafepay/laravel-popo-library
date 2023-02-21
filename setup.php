<?php

$composerFile = '/workspace/laravel/composer.json';

$composerData = json_decode(file_get_contents($composerFile), true);
$composerData['autoload-dev']['psr-4']['Multisafepay\\'] = '../src/';

file_put_contents($composerFile, json_encode($composerData, JSON_PRETTY_PRINT));

$envFile = '/workspace/.env';
$envFileLaravel = '/workspace/laravel/.env';

if (! file_exists($envFile)) {
    die('No .env file');
}

$envData = file_get_contents($envFile);

file_put_contents($envFileLaravel, $envData, FILE_APPEND);