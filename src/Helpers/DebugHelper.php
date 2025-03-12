<?php

declare(strict_types=1);

namespace App\Helper;

use function ob_get_clean;
use function ob_start;
use function var_dump;

class DebugHelper
{
    /**
     * Возвращает результат var_dump в виде строки.
     *
     * @param array $data Данные для отладки.
     * @return string Результат var_dump.
     */
    public static function varDumpToString(array $data): string
    {
        ob_start();
        var_dump($data);
        return ob_get_clean();
    }

    /**
     * Возвращает результат var_dump в HTML-формате.
     *
     * @param mixed $data Данные для отладки.
     * @return string Результат var_dump, обернутый в <pre>.
     */
    public static function toHTML($data): string
    {
        return '<pre>' . $data . '</pre>';
    }
}
