<?php

require_once __DIR__ . '/../Models/Fatura.php';
require_once __DIR__ . '/../Models/Loja.php';

class FaturaController
{
    public function index()
    {
        $faturas = Fatura::all();
        $pageTitle = 'Faturas';
        $contentView = __DIR__ . '/../Views/fatura/index.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function show($id)
    {
        $fatura = Fatura::find($id);
        if (is_null($fatura)) {
            header('Location: ' . url('/fatura'));
            exit;
        }
        $loja = Loja::find(1);
        $pageTitle = 'Fatura';
        $contentView = __DIR__ . '/../Views/fatura/show.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function create()
    {
        $pageTitle = 'Criar fatura';
        $contentView = __DIR__ . '/../Views/fatura/create.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function store()
    {
        try {
            $fatura = new Fatura();
            $fatura->nomecliente   = $_POST['nomecliente'] ?? null;
            $fatura->moradacliente = $_POST['moradacliente'] ?? null;
            $fatura->nifcliente    = $_POST['nifcliente'] ?? null;
            $fatura->data          = date('Y-m-d');
            $fatura->generateNumber();
            $fatura->save();

            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Fatura criada com sucesso'];
            header('Location: ' . url('/fatura'));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao criar fatura'];
            header('Location: ' . url('/fatura/create'));
            exit;
        }
    }

    // public function estado(){
    //     $emitir = $_POST['emitir'];
    //     $cancelar = $_POST['cancelar'];

    //     if($emitir){
            
    //     }
    // }

    public function edit($id)
    {
        $fatura = Fatura::find($id);
        if (is_null($fatura)) {
            header('Location: ' . url('/fatura'));
            exit;
        }
        $pageTitle = 'Editar fatura';
        $contentView = __DIR__ . '/../Views/fatura/edit.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function update($id)
    {
        $fatura = Fatura::find($id);
        if (is_null($fatura)) {
            header('Location: ' . url('/fatura'));
            exit;
        }
        try {
            $fatura->update([
                'nomecliente'   => $_POST['nomecliente'] ?? null,
                'moradacliente' => $_POST['moradacliente'] ?? null,
                'nifcliente'    => $_POST['nifcliente'] ?? null,
            ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Fatura atualizada com sucesso'];
            header('Location: ' . url('/fatura'));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao atualizar fatura'];
            header('Location: ' . url('/fatura/' . $id . '/edit'));
            exit;
        }
    }

    public function delete($id)
    {
        $fatura = Fatura::find($id);
        if (!is_null($fatura)) {
            foreach ($fatura->linhafaturas as $linha) {
                $linha->delete();
            }
            $fatura->delete();
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Fatura apagada com sucesso'];
        }
        header('Location: ' . url('/fatura'));
        exit;
    }
}
