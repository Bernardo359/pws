<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex1/ETC...</title>
</head>
<body>
    <?php
        $protocolo = "https://";
        $dominio = "www.ipleiria.pt";
        $caminho = "/estudar/cursos/tesp/";

        $url = $protocolo . $dominio . $caminho;
    ?>
    <a href="<?php echo $url?>">IPLEIRIA</a>
</body>
</html>