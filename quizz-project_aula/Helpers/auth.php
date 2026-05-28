<?php


class Auth
{
    public static function check():bool {
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
    }

    public static function require():void {
        if (!self::check()) {
            header('location: ./login');
            exit;
        }
    }
}