<?php

class Authenticator{

    private $validUsername = "admin";
    private $validPassword = "admin";

    public function __construct() {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function checkAuth($username, $password){
        if($username === $this->validUsername && $password === $this->validPassword){
            $_SESSION['username'] = $username;
            return true;
        } 
        return false;
    }

    public function isLoggedIn(){
        return isset($_SESSION['username']);
    }

    public function logout(){
        session_destroy();
    }
}


