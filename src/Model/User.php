<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table      = 'users'; // Имя таблицы
    protected $primaryKey = 'id'; // Первичный ключ
    public $timestamps    = true; // Использовать поля created_at и updated_at

    // Массовое присваивание (fillable fields)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Скрытые поля (не возвращаются в JSON)
    protected $hidden = [
        'password',
    ];
}
