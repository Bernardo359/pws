<?php

require_once __DIR__ . '/../Models/Linhafatura.php';
require_once __DIR__ . '/../Models/Produto.php';

class LinhaFaturaController
{
    public function create($fatura_id)
    {
        $produtos = Produto::all();
        $pageTitle = 'Adicionar linha';
        $contentView = __DIR__ . '/../Views/linhafatura/create.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function store()
    {
        $fatura_id = $_POST['fatura_id'] ?? null;
        $produto_id = $_POST['produto_id'] ?? null;
        $quantidade = $_POST['quantidade'] ?? null;

        $existing = Linhafatura::where('fatura_id', $fatura_id)
            ->where('produto_id', $produto_id)
            ->first();

        if (!is_null($existing)) {
            $pageTitle = 'Linha duplicada';
            $contentView = __DIR__ . '/../Views/linhafatura/duplicated.php';
            require __DIR__ . '/../Views/layout.php';
            return;
        }

        try {
            $linha = new Linhafatura();
            $linha->fatura_id  = $fatura_id;
            $linha->produto_id = $produto_id;
            $linha->quantidade = $quantidade;
            $linha->saveWithSubtotal();

            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Linha adicionada com sucesso'];
            header('Location: ' . url('/fatura/' . $fatura_id));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao adicionar linha'];
            header('Location: ' . url('/fatura/' . $fatura_id . '/linhafatura/create'));
            exit;
        }
    }

    public function delete($id)
    {
        $linha = Linhafatura::find($id);
        if (is_null($linha)) {
            header('Location: ' . url('/fatura'));
            exit;
        }
        $fatura_id = $linha->fatura_id;
        $linha->deleteLine();
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Linha removida com sucesso'];
        header('Location: ' . url('/fatura/' . $fatura_id));
        exit;
    }
}
