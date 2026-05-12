<?php

function greet($name, $greeting = 'Hello'){
    return "$greeting, [$name]!";
};

function formatName($name){
    $name = strtolower($name);
    $name = ucfirst($name);

    return $name;
}

function describeAnimal($type, $name){
    $format = formatName($name);
    return "$format is a $type";
}


function makeAnimal($type, $name){
    $animal = ['type' => "$type", 'name' => "$name", 'position' => 0];
    return $animal;
}

function walk($animal){
    $newAnimal = $animal;

    $newAnimal['position']++;

    return $newAnimal;
}

function describePosition($animal){
    return $animal['name'] . ' the ' . $animal['type'] . ' is at position ' . $animal['position'];
}

// echo greet('Armando');
// echo greet('Armando', 'Olá');

// echo formatName('armAndo');

// echo describeAnimal('dog', 'bObBY');

$cao = makeAnimal('dog', 'Cao');
// $cao = walk($cao);
// $cao = walk($cao);
// $cao = walk($cao);
// $cao = walk($cao);
// echo describePosition($cao);

for ($i = 0; $i<=2; $i++):
    $cao = walk($cao);
    echo describePosition($cao) . '<br>';
endfor;