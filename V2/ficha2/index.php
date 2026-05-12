<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha2</title>
</head>
<body>
    <?php
        $protocolo = 'https://';
        $dominio = 'www.ipleiria.pt';
        $caminho = '/estudar/cursos/tesp/';

        $url = $protocolo . $dominio . $caminho;

        $num1 = 15;
        $num2 = 10;

        echo '$num1(' . $num1 . ') '. '+ num2' . '(' . $num2 . ') = ' . $num1 + $num2 . '<br>';
        echo '$num1(' . $num1 . ') '. '- num2' . '(' . $num2 . ') = ' . $num1 - $num2 . '<br>';
        echo '$num1(' . $num1 . ') '. '* num2' . '(' . $num2 . ') = ' . $num1 * $num2 . '<br>';
        echo '$num1(' . $num1 . ') '. '/ num2' . '(' . $num2 . ') = ' . $num1 / $num2 . '<br>';


        $array = [1022 => 'Atletismo', 100 => 'Badminton', 2658 => 'Basquetebol', 
                    5000 => 'Futebol', 1026 => 'Natação'];

        
    ?>

    <br>

    <select>
        <?php
            foreach($array as $nmr => $sport):?>
                <option>
                    <?php echo $sport . '(' . $nmr . ')'?>
                </option>
            <?php endforeach ?>
        
    </select>

    <br>
    <br>
    <br>

    <a href="<?php $url?>">Hiperligaçao</a>
</body>
</html>