<?php
require_once __DIR__.'/../Models/Question.php';

class QuizzController
{
    public function home()
    {
        require './Views/home.php';
    }

    public function setName()
    {
        $_SESSION['player_name'] = trim($_POST['player_name']);
        header('Location: '.url('/quizz'));
        exit();
    }

    public function index()
    {
        if(empty($_SESSION['player_name'])){
            header('Location: '.url('/'));
            exit();
        }
        $questions = Question::playable()->get();
        require './Views/quizz/index.php';
    }

    public function submit()
    {
        $questions = Question::playable()->get();
        $total =0;
        foreach ($questions as $question) {
            $selected = $_POST['answers'][$question->id];

            if($selected && $question->isAnswerCorrectly((int)$selected)){
                $total += $question->getPoints();
            }
        }
        $_SESSION['last_score'] = $total;
        unset($_SESSION['player_name']);
        header('Location: '.url('quizz/result'));
        exit();
    }

    public function result()
    {
        if(!isset($_SESSION['last_score'])){
            header('Location: '.url('/'));
            exit();
        }
        $score = $_SESSION['last_score'];
        unset($_SESSION['last_score']);
        require 'Views/quizz/result.php';
    }
}