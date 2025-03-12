# Mezzio Skeleton and Installer

![screenshot-installer](https://user-images.githubusercontent.com/1011217/90332191-55d32200-dfbb-11ea-80c0-27a07ef5691a.png)

  - Создание проекта используя composer
    ```bash
    composer create-project mezzio/mezzio-skeleton <project-path>
    ```
  - встроенный PHP-сервер для проверки:
    ```bash
    composer serve
    ```
  - адрес: http://localhost:8080.

2. **Установка альтернативных пакетов**:
  - Можно вручную указать пакет и версию при выборе шаблонизатора или других компонентов.
  - Пример:
    ```text
    Which template engine do you want to use?
    [1] Plates
    [2] Twig
    [3] zend-view installs zend-servicemanager
    [n] None of the above
    Make your selection or type a composer package name and version (n): infw/pug:0.1
    ```
  - Ограничения:
    - Пакет должен быть в формате `namespace/package:1.0`.
    - Шаблоны не копируются, но можно настроить `ConfigProvider`.
    - Не работает для контейнеров, так как требуется копирование `container.php`.

3. **Решение проблем**:
  - Если установка не удалась:
    1. Обновите Composer: `composer self-update`.
    2. Очистите кеш Composer: `composer clear-cache`.
  - Возможные серьезные проблемы:
    - Ошибка `zlib_decode`: [ссылка](https://github.com/composer/composer/issues/4121).
    - Режим degraded mode: [решения](https://getcomposer.org/doc/articles/troubleshooting.md#degraded-mode).

4. **Режим разработки**:
  - Включение режима разработки:
    ```bash
    composer development-enable
    ```
    **Важно:** Не используйте в production!
  - Отключение режима разработки:
    ```bash
    composer development-disable
    ```
  - Проверка статуса:
    ```bash
    composer development-status
    ```

5. **Кеширование конфигурации**:
  - Кеш конфигурации хранится в `data/config-cache.php`.
  - В режиме разработки кеш отключен.
  - Очистка кеша в production:
    ```bash
    composer clear-config-cache
    ```
  - Путь к кешу можно изменить в `config/config.php`.

6. **Разработка скелетона**:
  - Если вы клонировали репозиторий через `git clone`, установите зависимости:
    ```bash
    composer update --no-scripts
    ```
  - Запуск тестов:
    ```bash
    composer test
    ```
  - Перед внесением изменений ознакомьтесь с [руководством по вкладу](https://github.com/mezzio/.github/blob/master/CONTRIBUTING.md).

---

### Основные команды:
- **Создание проекта**: `composer create-project mezzio/mezzio-skeleton <project-path>`
- **Запуск сервера**: `composer serve`
- **Включение режима разработки**: `composer development-enable`
- **Очистка кеша**: `composer clear-config-cache`

---

# Структура проекта

```
/var/www/application
├── config/                  # Конфигурационные файлы
│   ├── config.php           # Основной конфигурационный файл
│   ├── container.php        # Конфигурация контейнера зависимостей
│   ├── pipeline.php         # Конфигурация middleware pipeline
│   └── routes.php           # Конфигурация маршрутов
├── public/                  # Публичные файлы (точка входа)
│   └── index.php            # Основной файл для обработки запросов
├── src/                     # Исходный код приложения
│   └── App/                 # Код вашего приложения
│       └── Handler/         # Обработчики запросов
│           └── HomePageHandler.php
├── templates/               # Шаблоны (если используется шаблонизатор)
│   └── app/
│       └── home-page.phtml
├── vendor/                  # Зависимости, установленные через Composer
└── composer.json            # Файл конфигурации Composer
```