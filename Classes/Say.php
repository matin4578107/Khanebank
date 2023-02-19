<?php namespace Classes;

abstract class Say {
    public function __construct(public string $name) {
        
    }

    abstract public function laugh(string $name);
}

?>