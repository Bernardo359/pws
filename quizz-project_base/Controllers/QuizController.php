<?php 

require_once __DIR__ . '/../Models/Result.php';
require_once __DIR__ . '/../Models/Option.php';
require_once __DIR__ . '/../Models/Question.php';

class QuizController{
    public function show(){
        $nome = $_GET['nome'] ?? '';

        $questions = Question::with('options')->get();

        require 'Views/quiz.php';
    }

    public function submit() {

        $score = 0;

        foreach ($_POST as $key => $value) {

            if (strpos($key, 'question_') === 0) {

                $questionId = str_replace('question_', '', $key);

                // procura a opção escolhida
                $selectedOption = Option::find($value);

                if ($selectedOption && $selectedOption->is_correct) {

                    // contar nº de opções da pergunta
                    $totalOptions = Option::where('question_id', $questionId)->count();

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