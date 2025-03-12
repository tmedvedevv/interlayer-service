<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;

$config = include 'config/autoload/database.global.php';

$capsule = new Capsule();
$capsule->addConnection($config['database']['default']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
