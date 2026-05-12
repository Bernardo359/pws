<?php

require_once __DIR__ . '/../Models/Question.php';
require_once __DIR__ . '/../Models/Option.php';

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

        $user = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';

        if ($user === $this->username && $pass === $this->password) {
            $_SESSION['admin'] = true;
            header('Location: ' . url('/admin/dashboard'));
            exit;
        }

        echo "Login inválido";
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

    public function createForm() {
        require 'Views/admin/create.php';
    }

    public function create() {

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

    public function delete($id) {

        Question::destroy($id);

        header('Location: ' . url('/admin/dashboard'));
    }
}
