<?php

namespace App\Model;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class Cart implements IteratorAggregate, Countable
{
    private array $items;
    public function __construct(){
        $this->items = [];
    }

    public function getIterator(): Traversable{
        return new ArrayIterator($this->items);
    }
    public function count(): int{
        return count($this->items);
    }

}