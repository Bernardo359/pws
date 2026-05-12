<?php

session_start();

class Auth{
    private static $validcredencials= [
        'username' = 'admin';
        'password' = 'admin'
    ]

    public static function checkAuth($username, $password){
        if($username = self::$validcredencials['username'] && $password = self::$validcredencials['password']){
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }

    public static function isLogged($username){
        return isset($_SESSION['username']);
    }

    public stactic function Logout(){
        session_unset();
        session_destroy();
    }
}

