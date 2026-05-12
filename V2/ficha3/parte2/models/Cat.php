<?php

class Cat extends Animal{
    public function speak(){
        return "$this->name says Miau Miau";
    }
}