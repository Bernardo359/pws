<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex4</title>
</head>
<body>
    <?php
        $vetor = [1022 => 'Atletismo', 100 => 'Badminton', 2658 => 'Basquetebol', 
                5000 => 'Futebol', 1026 => 'Natação'];
    ?>

    <select>
        <option><?php echo $vetor[1022]?>(1022)</option>
        <option><?php echo $vetor[100]?>(100)</option>
        <option><?php echo $vetor[2658]?>(2658)</option>
        <option><?php echo $vetor[5000]?>(5000)</option>
        <option><?php echo $vetor[1026]?>(1026)</option>
    </select>
</body>
</html>