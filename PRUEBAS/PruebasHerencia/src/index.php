<?php
declare(strict_types=1);
require_once "app/Alumno.php";
require_once "app/Coche.php";

$alice = new Alumno(1, "23", "Alice", "u", 2);

$alice->addEtiqueta(("Alumno"));

$coche = new Coche("ks");
$coche->addEtiqueta(("Deportivo"));

echo ("Equiqueta alumno: " . $alice->getEtiquetas()[0]);
echo ("<br/>Etiqueta coche: " . $coche->getEtiquetas()[0]);
