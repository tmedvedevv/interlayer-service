<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Phpmig\Migration\Migration;

class Accounts extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Capsule::schema()->create('accounts', function (Blueprint $table) {
            $table->increments('id'); // Автоинкрементируемый первичный ключ
            $table->string('base_url', 255); // URL аккаунта (строка фиксированной длины)
            $table->text('access_token'); // Токен доступа (текстовое поле для длинных данных)
            $table->timestamp('expires_at')->nullable(); // Время истечения токена (может быть NULL)
            $table->text('refresh_token')->nullable(); // Токен обновления (текстовое поле, может быть NULL)
            $table->timestamps(); // Поля created_at и updated_at
        });
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->dropIfExists('accounts');
    }
}
