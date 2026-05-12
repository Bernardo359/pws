<?php 

function greet($greeting, $name){
    return "$greeting, $name";
}

function formatName($name) {
    $name = strtolower($name);
    return ucfirst($name);
}

greet($greeting = 'olá', $name = 'cona');
echo greet($greeting, $name);
echo '<br>';
greet($greeting = 'Boas', $name = 'olaf',);
echo greet($greeting, $name);

echo '<br>';
echo formatName('olaf');