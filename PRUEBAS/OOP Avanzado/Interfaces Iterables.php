<?php
interface Traversable
{
}

interface Iterator extends Traversable
{
    public function current(): mixed;
    public function key(): mixed;
    public function next(): void;
    public function rewind(): void;
    public function valid(): bool;
}

interface IteratorAggregate extends Traversable
{
    public function getIterator(): Traversable;
}
