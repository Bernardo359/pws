<?php
require_once __DIR__ . '/../Helpers/auth.php';

class AuthController {
    public function showLogin() {
        if (Auth::check()) {
            header('location: '.url('/admin/questions'));
            exit;
        }

        require './Views/login.php';
    }

    public function login()
    {
        if($_POST["username"] === ADMIN_USERNAME
            && $_POST["password"] === ADMIN_PASSWORD){
            $_SESSION['is_admin'] = true;
            header('Location: '.url('/admin/questions'));
        }else {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Invalid username or password'];
            header('Location: '.url('/login'));
        }
    }

    public function logout(){
        session_destroy();
        header('Location: '.url('/login'));
        exit;
    }
}
