<?php
require_once "authenticator.php";

    $auth = new Authenticator();

    if(!$auth->isLoggedIn()){
        header("Location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutas</title>
</head>
<body>
    <a href="logout.php" style="padding-left:90%">Logout</a>
    <form method="post" action="">
        <label for="frutas[]">Escolha as suas frutas favoritas:</label><br>
        <input type="checkbox" name="frutas[]" value="morango">Morango<br>
        <input type="checkbox" name="frutas[]" value="laranja">Laranja<br>
        <input type="checkbox" name="frutas[]" value="banana">Banana<br>
        <input type="checkbox" name="frutas[]" value="framboesa">Framboesa<br>
        <button type="submit">Submeter</button>
    </form>
    <?php
        if(isset($_POST['frutas'])){
            $frutas = $_POST['frutas'];
            echo 'As suas frutas favoritas são: ';
            foreach($frutas as $fruta){
                echo $fruta . ', ';
            }
        }
    ?>
    
</body>
</html>