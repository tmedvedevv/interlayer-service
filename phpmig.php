<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Phpmig\Adapter;
use Pimple\Container;

$container = new Container();

$container['config'] = [
    'driver'    => 'mysql',
    'host'      => 'application-mysql',
    'database'  => 'app_db',
    'username'  => 'admin',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$container['db'] = static function ($c) {
    $capsule = new Capsule();
    $capsule->addConnection($c['config']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['phpmig.adapter'] = static function ($c) {
    return new Adapter\Illuminate\Database($c['db'], 'migrations');
};

$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';

return $container;
