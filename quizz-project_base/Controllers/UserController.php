<?php

require_once 'Models/User.php';

class UserController{

    public function create(){
        $pageTitle = "Registar Novo User";
        require 'Views/user/register.php';
    }

    public function store(){
        $user = trim($_POST['username'] ?? '');
        $pass = trim($_POST['password'] ?? '');
        $isAdmin = $_POST['isAdmin'] ?? 0;

        if($user === '' || $pass === ''){
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'A sessão falhou'];
            header('Location: '. url('/register'));
            exit;
        }
        try{
            User::create(['username' => $user,
                        'password' => $pass,
                        'is_admin' => $isAdmin
                        ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Passou'];
            if($isAdmin == 0){
                header('Location: ' . url('/quiz'));
            }else{
                header('Location: ' . url('/admin'));
            }

        } catch(\Exception $e){
            $_SESSION['flash'] = ['type' => 'error' , 'message' => 'Erro: ' . $e->getMessage()];
        }
    }

    public function loginForm(){
        require 'Views/user/login.php';
    }

    public function login(){
        $user = trim($_POST['username'] ?? '');
        $pass = trim($_POST['password'] ?? '');
        // var_dump($user, $pass);
        // die;

        if($user === '' || $pass === ''){
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'A sessão falhou'];
            header('Location: '. url('/login'));
            exit;
        }
        try{
            $cred = User::where('username', $user)->where('password', $pass)->first();
            $isAdmin = $cred->is_admin;
            // var_dump($isAdmin);
            // die;
            if ($cred) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Passou'];
                if($isAdmin == 0){
                    header('Location: ' . url('/'));
                } else{
                    header('Location: ' . url('/admin/dashboard'));
                }
                exit();
            } else {
                $_SESSION['login_error'] = 'Username ou password inválida!';
                header('Location: ' . url('/login'));
                exit();
            }
            
            
            // if($isAdmin === 0){
            //     header('Location: ' . url('/quiz'));
            // }else{
            //     header('Location: ' . url('/admin'));
            // }

        } catch(\Exception $e){
            $_SESSION['flash'] = ['type' => 'error' , 'message' => 'Erro: ' . $e->getMessage()];
        }
    }
}