<?php

require ('models/Animal.php');
require ('models/Cat.php');
require ('models/Dog.php');

$rex = new Dog("Rex");
$buddy = new Dog("Buddy", 5);

$whiskers = new Cat("Whiskers");
$luna = new Cat("Luna");

for($i = 0; $i < 3; $i++){
    $rex->walk();
}

for($i = 0; $i < 1; $i++){
    $buddy->walk();
}

for($i = 0; $i < 2; $i++){
    $whiskers->walk();
}

echo $rex->getName() . " diz: " . $rex->speak() . " na posição: " . $rex->getPosition() . "<br>";
echo $buddy->getName() . " diz: " . $buddy->speak() . " na posição: " . $buddy->getPosition() . "<br>";
echo $whiskers->getName() . " diz: " . $whiskers->speak() . " na posição: " . $whiskers->getPosition() . "<br>";
echo $luna->getName() . " diz: " . $luna->speak() . " na posição: " . $luna->getPosition() . "<br>";
