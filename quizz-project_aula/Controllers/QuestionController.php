<?php
require_once __DIR__ . '/../Models/Question.php';
require_once __DIR__ . '/../Helpers/Auth.php';


class QuestionController{
    public function index(){
        Auth::require();
        $questions = Question::all();
        require 'Views/admin/questions/index.php';
    }

    //POST->Create - Metodo utilizado para fazer o setup das respostas
    public function setUpAnswers()
    {
        $text = trim($_POST['text'] ?? '');
        $numAnswers = trim($_POST['num_answers'] ?? 4);
        //Validação ao texto
        if($text === ''){
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Question Text is required.' ];
            header('Location: ' . url("/admin/questions/create"));
            exit;
        }
        $numAnswers = max(2,min(15,$numAnswers));
        require_once 'Views/admin/questions/answers.php';
    }
    //GET->Create - função usada para devolver a página de criação de perguntas
    public function create(){
        require 'Views/admin/questions/create.php';
    }
    //metodo utilizado para gravar perguntas na base de dados
    public function store(){
        $answers = array_values(
            array_filter($_POST['answers'] ?? [],
                fn($a) => trim($a) !== '') // remove respostas vazias ou apenas com espaços
        );

        if(count($answers) < 2){ // verifica se existem pelo menos 2 respostas
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'At least 2 answers.' ];
            header('Location: ' . url("/admin/questions/create"));
            exit;
        }

        try{
            $question = Question::create(['text' => $_POST['text']]);
            $question->saveAnswers($answers, (int)$_POST['correct_index']);
            // guarda uma mensagem temporária para mostrar ao utilizador
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Question created and answers stored!'];
        }catch (\Exception $e){
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Error creating question or answers!'];
        }
        header('location: '. url('/admin/questions'));
    }
    public function edit($id){
        $question = Question::with('answers')->find($id);
        require 'Views/admin/questions/edit.php';
    }
    public function update($id){
        try{
            $question = Question::find($id);
            $question->update(['text' => $_POST['text']]);
            $answers = array_values(
                array_filter(
                    $_POST['answers'] ?? [],
                    fn($a) => trim($a) !== ''
                )
            );
            $question->saveAnswers($answers, (int)$_POST['correct_index']);

            $_SESSION['flash'] =
                ['type'=>'success', 'message' => 'Question and answers updated, successfully!'];
        }catch (Exception $e){
            $_SESSION['flash'] =
                ['type'=>'error', 'message' => 'Failed to update the question or answers.'];
        }
        header('Location: ' . url('/admin/questions'));
        exit;
    }
    public function destroy($id){
        try{
            $question = Question::find($id);
            $question->answers()->delete(); // Apaga as respostas associadas à pergunta
            $question->delete();
            $_SESSION['flash'] = ['type'=>'success', 'message' => 'Question deleted, successfully!'];
        }catch (Exception $e){
            $_SESSION['flash'] = ['type'=>'error', 'message' => 'Failed to deleted the question.'];
        }
        header('Location: ' . url('/admin/questions'));
    }
}
