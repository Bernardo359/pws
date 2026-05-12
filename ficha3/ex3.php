<?php

function describeAnimal($type, $name){
    $name = formatName($name);
    return "$name is a $type";
}

function formatName($name) {
    $name = strtolower($name);
    return ucfirst($name);
}

function makeAnimal($type, $name){
    $name = formatName($name);
    return ['type' => $type, 'name' => $name, 'position' => 1];
}

function walk($animal){
    $novoAnimal = $animal;
    $novoAnimal["position"]++;

    return $novoAnimal;
}

function describePosition($animal){
    return $animal['name'] . ' the ' . $animal['type'] . ' is at position ' . $animal['position'];
}

echo describeAnimal('tipo1', 'cona');

echo '<br>';

$animal = makeAnimal('tipo3', 'REX');
$animal2 = walk($animal);
print_r($animal);
echo '<br>';
print_r($animal2);

echo '<br>';
echo describePosition($animal);

$rex = makeAnimal('cão', 'REX');
$rex2 = walk($rex);
$rex3 = walk($rex2);

echo '<br>';
echo '<br>';
echo '<br>';
echo describePosition($rex);
echo '<br>';
echo describePosition($rex2);
echo '<br>';
echo describePosition($rex3);

// echo '<br>';
// print_r($rex);
// echo '<br>';
// print_r($rex2);
// echo '<br>';
// print_r($rex3);