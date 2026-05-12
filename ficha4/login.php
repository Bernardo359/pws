<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="painel.php">
        <label>Username: </label>
        <input type="text" name="username" required>
        <br>
        <br>
        <label>Password: </label>
        <input type="password" name="password" required>
        <br>
        <br>
        <button type="submit" style="margin-left: 7%">Entrar</button>
    </form>
    <?php
    session_start();

        if(isset($_SESSION['erro'])){
            echo '<p style="color:red;">' . $_SESSION['erro'] . '</p>';
            unset($_SESSION['erro']);
        }
    ?>
</body>
</html>