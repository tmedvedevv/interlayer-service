<?php

// Директива включающая строгую типизацию
declare(strict_types=1);

// изменяет текущую рабочую директорию на указанную
chdir(__DIR__ . '/../');

// подключает автозагрузчик Composer, который автоматически подключает классы и библиотеки, установленные через Composer
require 'vendor/autoload.php';

$config = include 'config/config.php';

if (! isset($config['config_cache_path'])) {
    echo "No configuration cache path found" . PHP_EOL;
    exit(0);
}

if (!file_exists($config['config_cache_path'])) {
    printf(
        "Configured config cache file '%s' not found%s",
        $config['config_cache_path'],
        PHP_EOL
    );
    exit(0);
}

if (false === unlink($config['config_cache_path'])) {
    printf(
        "Error removing config cache file '%s'%s",
        $config['config_cache_path'],
        PHP_EOL
    );
    exit(1);
}

printf(
    "Removed configured config cache file '%s'%s",
    $config['config_cache_path'],
    PHP_EOL
);
exit(0);
