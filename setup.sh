rm -rf laravel

composer create-project laravel/laravel laravel

rm laravel/tests/Feature/ExampleTest.php
rm laravel/tests/Unit/ExampleTest.php

cp -r tests/* laravel/tests/Feature

php setup.php

cd laravel

composer require multisafepay/laravel-cast-json-models

composer update

php artisan test

sleep infinity