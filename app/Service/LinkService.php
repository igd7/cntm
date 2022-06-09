<?php

namespace App\Service;

use Illuminate\Support\Str;

class LinkService
{
    private $length = 8;

    public function getRandomString(int $length = null): string
    {
        $length = $length ?? $this->length;

        return Str::random($length);
    }

    public function getStringLength()
    {
        return $this->length;
    }
}
