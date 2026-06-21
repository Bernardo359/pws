<?php

require_once __DIR__ . '/../Models/Recibo.php';
require_once __DIR__ . '/../Models/Fatura.php';
require_once __DIR__ . '/../Models/Loja.php';

class ReciboController{

    public function index(){
        $recibos = Recibo::all();
        $pageTitle = 'Recibo';
        $contentView = __DIR__ . '/../Views/recibo/index.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function create(){
        $fatura_id = $_GET['fatura_id'] ?? null;
        $recibo = new Recibo();
        $recibo->fatura_id = $fatura_id;
        $pageTitle = 'Criar Recibo';
        $contentView = __DIR__ . '/../Views/recibo/create.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function store()
    {
        try {
            $recibo = new Recibo();
            $recibo->data = date('Y-m-d');
            $recibo->valor = $_POST['valor'] ?? null;
            $recibo->metodo = $_POST['metodo'] ?? null;
            $recibo->fatura_id = $_POST['fatura_id'] ?? null;
            $recibo->save();

            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Recibo criado com sucesso'];
            header('Location: ' . url('/recibo'));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao criar recibo'];
            header('Location: ' . url('/recibo/create'));
            exit;
        }
    }

    public function show($id)
    {
        $recibo = Recibo::find($id);

        if (is_null($recibo)) {
            header('Location: ' . url('/recibo'));
            exit;
        }

        $fatura_id = $recibo->fatura_id;
        $fatura = Fatura::find($fatura_id);
        // var_dump($fatura);
        // exit;
        $loja = Loja::find(1);
        $pageTitle = 'Recibo';
        $contentView = __DIR__ . '/../Views/recibo/show.php';
        require __DIR__ . '/../Views/layout.php';
    }
}