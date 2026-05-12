<?php

abstract class Animal{
    protected String $name;
    protected int $position;

    public function __construct($name, $position = 0)
    {
        $this->name = $name;
        $this->position = $position;
    }

    public function walk(){
        $this->position++;
    }

    public function getPosition(){
        return $this->position;
    }

    public function getName(){
        return $this->name;
    }

    abstract public function speak();
}