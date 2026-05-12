<?php

class Dog extends Animal{
    public function speak(){
        return "$this->name says Woof Woof";
    }
}