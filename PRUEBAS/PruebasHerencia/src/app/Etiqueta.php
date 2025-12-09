<?php

trait Etiqueta
{
    private $etiquetas = [];

    public function addEtiqueta(string $etiqueta): bool
    {
        if (!in_array($etiqueta, $this->etiquetas)) {
            $this->etiquetas[] = $etiqueta;
            return true;
        }
        return false;
    }

    public function delEtiqueta(string $etiqueta): void
    {
        $pos = array_search($etiqueta, $this->etiquetas);
        if ($pos !== false) {
            unset($this->etiquetas[$pos]);
        }
    }
    public function getEtiquetas(): array
    {
        return $this->etiquetas;
    }
}
