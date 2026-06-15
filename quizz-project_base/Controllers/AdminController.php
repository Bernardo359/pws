<?php

require_once __DIR__ . '/../Models/Question.php';
require_once __DIR__ . '/../Models/Option.php';
require_once __DIR__ . '/../Models/User.php';

class AdminController
{
    private $username = "admin";
    private $password = "admin";

    public function loginForm()
    {
        require 'Views/admin/login.php';
    }

    public function login()
    {
        $user = trim($_POST['username'] ?? '');
        $pass = trim($_POST['password'] ?? '');
        // var_dump($user, $pass);
        // die;

        if ($user === '' || $pass === '') {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'A sessão falhou'];
            header('Location: ' . url('/login'));
            exit;
        }
        try {
            //$cred é credenciais
            $cred = User::where('username', $user)->where('password', $pass)->where('isAdmin', 1)->first();
            // $isAdmin = $cred->isAdmin;
            // var_dump($cred);
            // die;
            if ($cred == true) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Passou'];
                $_SESSION['admin'] = true;
                header('Location: ' . url('admin/dashboard'));
                exit(); 
            } else {
                $_SESSION['login_error'] = 'Username ou password inválida para o ADMINISTRADOR!';
                header('Location: ' . url('/admin'));
                exit();
            }
        } catch (\Exception $e) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro: ' . $e->getMessage()];
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . url('/admin'));
        exit;
    }

    public function dashboard()
    {

        if (!isset($_SESSION['admin'])) {
            header('Location: ' . url('/admin'));
            exit;
        }

        $questions = Question::with('options')->get();

        require 'Views/admin/dashboard.php';
    }

    public function createForm()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . url('/admin'));
            exit;
        }

        require 'Views/admin/create.php';
    }

    public function create()
    {
        // die('ENTREI NO CREATE');

        if (!isset($_SESSION['admin'])) {
            header('Location: ' . url('/admin'));
            exit;
        }

        $question = Question::create([
            'question_text' => $_POST['question']
        ]);

        foreach (($_POST['options']) as $index => $text) {
            Option::create([
                'question_id' => $question->id,
                'option_text' => $text,
                'is_correct' => (($index + 1) == $_POST['correct'])
            ]);
        }

        header('Location: ' . url('/admin/dashboard'));
    }

    public function delete($id)
    {

        if (!isset($_SESSION['admin'])) {
            header('Location: ' . url('/admin'));
            exit;
        }

        Question::destroy($id);

        header('Location: ' . url('/admin/dashboard'));
    }
}
