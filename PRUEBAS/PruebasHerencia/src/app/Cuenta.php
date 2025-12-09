<?php
declare(strict_types=1);
class Cuenta
{
    public float $saldo = 0.0;

    public function ingresar(float $cantidad): Cuenta
    {
        $this->saldo += $cantidad;

        return $this;
    }
}
