<?php

namespace App\Service;

use Illuminate\Support\Str;

class LinkService
{
    private static $length = 8;

    public static function getRandomString(int $length = null): string
    {
        $length = $length ?? self::$length;

        return Str::random($length);
    }

    public static function getStringLength(): int
    {
        return self::$length;
    }
}
