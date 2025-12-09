<?php
declare(strict_types=1);
require_once "Persona.php";

$personas = [];

$alice = new Persona(1, "Alice", 18);
$juan = new Persona(2, "Juan", 18);
$paco = new Persona(3, "Paco", 72);
$maria = new Persona(4, "Maria", 21);


array_push($personas, $alice, $juan, $paco, $maria);
foreach ($personas as $person) {
    echo $person->toString();
}

file_put_contents("example.txt", json_encode($personas));

echo hash_file("sha256", "example.txt");

