<?php

declare(strict_types=1);

namespace App\Model;

class Producto
{
    protected static string $soy = "Producto";
    protected int $id;
    public function __construct(
        protected string $name
    ) {
        $this->id = 0;
    }

    public static function soy(): string
    {
        return static::$soy;
    }
}
