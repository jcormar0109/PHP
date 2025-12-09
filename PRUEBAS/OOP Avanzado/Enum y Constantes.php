<?php
enum Usuarios: string
{
    case Administrador = "admin";
    case Editor = "editor";
    case Invitado = "guest";
}

$rol = Usuarios::Invitado;

echo $rol->value;

$rol = Usuarios::from("admin");
$rol = Usuarios::tryFrom("admin");
