<?php

require_once ('models/Animal.php');
require_once ('models/Cat.php');
require_once ('models/Dog.php');

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

echo $rex->speak() . " -- Position " . $rex->getPosition() . '<br>';
echo $buddy->speak() . " -- Position " . $buddy->getPosition() . '<br>';
echo $whiskers->speak() . " -- Position " . $whiskers->getPosition() . '<br>';
echo $luna->speak() . " -- Position " . $luna->getPosition() . '<br>';

