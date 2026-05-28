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
                        'isAdmin' => $isAdmin
                        ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Passou'];
            header('Location: ' . url('/quiz'));
        } catch(\Exception $e){
            $_SESSION['flash'] = ['type' => 'error' , 'message' => 'Erro: ' . $e->getMessage()];
        }
    }
}