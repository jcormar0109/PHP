<?php
class Datos implements Countable
{
    private int $size = 29;

    public function count(): int
    {
        return $this->size;
    }
}
