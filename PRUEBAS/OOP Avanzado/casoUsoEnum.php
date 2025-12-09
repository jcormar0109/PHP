<?php
enum EstadoPedido: string
{
    case Pendiente = "pendiente";
    case Enviado = "enviado";
    case Entregado = "entregado";

    public function esFinalizado(): bool
    {
        return $this === self::Entregado;
    }
}

$estado = EstadoPedido::Entregado;

var_dump($estado->esFinalizado());

foreach (EstadoPedido::cases() as $estado) {
    echo $estado->name . "=>" . $estado->value;
}

