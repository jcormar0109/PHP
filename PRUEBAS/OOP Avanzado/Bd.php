<?php
class Bd
{
    private static ?Bd $instancia = null;

    private function __construct()
    {
        self::conectar();
    }

    private static function getInstancia(): Bd
    {
        if (self::$instancia === null) {
            self::$instancia = new Bd();
        }

        return self::$instancia;
    }
}
