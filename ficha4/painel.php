<?php

require_once "authenticator.php";

$auth = new Authenticator();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if($auth->checkAuth($username, $password) === true){
    header('Location: index.php');
} else {
    $_SESSION['erro'] = "Credenciais inválidas!";
    header('Location: login.php');
}
exit();