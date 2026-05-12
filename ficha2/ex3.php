<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaçõesz</title>
</head>
<body>
    <?php
        $num1 = 10;
        $num2 = 5;
        $soma = $num1 + $num2;
        $sub = $num1 - $num2;
        $mult = $num1 * $num2;
        $div = $num1 / $num2;
    ?>

    <p>$num1(<?php echo $num1?>) + $num2(<?php echo $num2?>) = <?php echo $soma?></p>
    <p>$num1(<?php echo $num1?>) - $num2(<?php echo $num2?>) = <?php echo $sub?></p>
    <p>$num1(<?php echo $num1?>) * $num2(<?php echo $num2?>) = <?php echo $mult?></p>
    <p>$num1(<?php echo $num1?>) / $num2(<?php echo $num2?>) = <?php echo $div?></p>
</body>
</html>