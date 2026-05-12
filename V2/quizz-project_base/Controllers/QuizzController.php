<?php

require_once __DIR__ . "/../Models/Question.php";
require_once __DIR__ . "/../Models/Option.php";
require_once __DIR__ . "/../Models/Result.php";

class QuizzController{
    public function show(){
        $nome = $_GET['nome'] ?? '';

        $questions = Question::with('options')->get();

        require 'Views/quizz.php';
    }

    public function submit(){
        $score = 0;

        foreach ($_POST as $key=>$value){
            if(strpos($key, 'question_') === 0){
                $questionId = str_replace('question_', '', $key);

                $selectedOption = Option::find($value);

                if($selectedOption && $selectedOption->is_correct){
                    $totalOptions = Option::where('question_id', $questionId)
                                            ->count();
                    $score += $totalOptions;
                }
            }
        }
        Result::create([
            'nome' => $_POST['nome'] ?? 'Anon',
            'score' => $score
        ]);

        echo "<h1>Pontuação: $score</h1>";
        echo '<a href="' . url('/') . '">Voltar</a>';
    }
}