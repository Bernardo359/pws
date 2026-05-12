<?php

require ('models/Animal.php');
require ('models/Cat.php');
require ('models/Dog.php');

$rex = new Dog("Rex", 10);
$buddy = new Dog("Buddy");
$myDog = new Dog("MyDog");
$pussias = new Cat("Pussias");
$bola = new Cat("Bola");

$animais = [$rex, $buddy, $myDog, $pussias, $bola]; 

foreach($animais as $animal){
    $random = rand(1,5);
    for($i = 0; $i < $random; $i++){
        $animal->walk();
    }
    echo  get_class($animal) . ': ' . $animal->getName() . ' says: ' . $animal->speak() . ' - Position: ' . $animal->getPosition() . '<br><br>';

}