<?php
declare(strict_types=1);
require_once("Etiqueta.php");

class Coche
{
    use Etiqueta;
    public function __construct(
        private string $matricula
    ) {
    }
}
