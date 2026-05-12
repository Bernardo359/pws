<?php

require_once ('models/Animal.php');
require_once ('models/Cat.php');
require_once ('models/Dog.php');


$rex = new Dog("Rex", 10);
$buddy = new Dog("Buddy", 3);
$myDog = new Dog("MyDog");
$pussias = new Cat("Pussias", 4);
$bola = new Cat("Bola");

$animais = [$rex, $buddy, $myDog, $pussias, $bola];

foreach($animais as $animal){
    for($i = 0; $i < rand(1,5); $i++):
        $animal->walk();
    endfor;
    echo get_class($animal) . ': ' . $animal->speak() . ' -- Position ' . $animal->getPosition() . '<br>';
}
