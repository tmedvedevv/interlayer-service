<?php

// Основной конфигурационный файл

// В этом файле конфигурации прописываются пути до скриптов DI всех модулей проекта.
// Каждый модуль — это отдельная бизнес-функция со своим набором зависимостей и классов обработчиков use-case.

declare(strict_types=1);

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

// Для включения или отключения кеширования, установите булево значение `ConfigAggregator::ENABLE_CACHE` в
// `config/autoload/local.php`.

$cacheConfig = [
    'config_cache_path' => 'data/cache/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \Mezzio\Router\FastRouteRouter\ConfigProvider::class,
    \Laminas\HttpHandlerRunner\ConfigProvider::class,
    // Включение конфигурации кеша
    new ArrayProvider($cacheConfig),
    \Mezzio\Helper\ConfigProvider::class,
    \Mezzio\ConfigProvider::class,
    \Mezzio\Router\ConfigProvider::class,
    \Laminas\Diactoros\ConfigProvider::class,

    // Конфигурация модуля приложения по умолчанию
    \App\ConfigProvider::class,

    // Загружаем конфигурацию приложения в заранее определенном порядке таким образом, чтобы локальные настройки
    // перезаписывали глобальные. (Загружается в следующем порядке: от первого к последнему):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),

    // Загружаем конфигурацию для разработки, если она существует
    new PhpFileProvider(realpath(__DIR__) . '/development.config.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
