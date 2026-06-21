<?php

require_once __DIR__ . '/../Models/Fatura.php';
require_once __DIR__ . '/../Models/Recibo.php';
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

    public function emitir($id)
    {
        $fatura = Fatura::find($id);

        if($fatura->estado != 'Em Elaboração'){
            die('Esta transição não é permitida!');
        }

        $fatura->estado = "Emitida";
        $fatura->save();

        header('Location: ' . url('/fatura/' . $id));
        exit;
    }

    public function cancelar($id){
        $fatura = Fatura::find($id);

        if($fatura->estado != 'Em Elaboração'){
            die('Esta transição não é permitida!');
        }

        $fatura->estado = "Cancelada";
        $fatura->save();

        header('Location: ' . url('/fatura/' . $id));
        exit;
    }

    public function criarRecibo(){
        $fatura_id = $_POST['fatura_id'] ?? null;
        $fatura = Fatura::find($fatura_id);

        if($fatura->estado != 'Emitida'){
            die('Esta transição não é permitida!');
        }

        // $recibo = Recibo::where('fatura_id', $fatura_id)->lastest()->first();

        // if (is_null($recibo)) {
        //     die('Recibo não encontrado!');
        // }

        header('Location: ' . url('/recibo/create?fatura_id=' . $fatura_id));
        exit;
    }

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
