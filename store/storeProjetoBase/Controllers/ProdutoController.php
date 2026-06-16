<?php

require_once __DIR__ . '/../Models/Produto.php';

class ProdutoController
{
    public function index()
    {
        $produtos = Produto::all();
        $pageTitle = 'Produtos';
        $contentView = __DIR__ . '/../Views/produto/index.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function show($id)
    {
        $produto = Produto::find($id);
        if (is_null($produto)) {
            header('Location: ' . url('/produto'));
            exit;
        }
        $pageTitle = 'Produto';
        $contentView = __DIR__ . '/../Views/produto/show.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function create()
    {
        $pageTitle = 'Criar produto';
        $contentView = __DIR__ . '/../Views/produto/create.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function store()
    {
        try {
            Produto::create([
                'referencia'    => $_POST['referencia'] ?? null,
                'descricao'     => $_POST['descricao'] ?? null,
                'precounitario' => $_POST['precounitario'] ?? null,
            ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Produto criado com sucesso'];
            header('Location: ' . url('/produto'));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao criar produto'];
            header('Location: ' . url('/produto/create'));
            exit;
        }
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        if (is_null($produto)) {
            header('Location: ' . url('/produto'));
            exit;
        }
        $pageTitle = 'Editar produto';
        $contentView = __DIR__ . '/../Views/produto/edit.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function update($id)
    {
        $produto = Produto::find($id);
        if (is_null($produto)) {
            header('Location: ' . url('/produto'));
            exit;
        }
        try {
            $produto->update([
                'referencia'    => $_POST['referencia'] ?? null,
                'descricao'     => $_POST['descricao'] ?? null,
                'precounitario' => $_POST['precounitario'] ?? null,
            ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Produto atualizado com sucesso'];
            header('Location: ' . url('/produto'));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao atualizar produto'];
            header('Location: ' . url('/produto/' . $id . '/edit'));
            exit;
        }
    }

    public function delete($id)
    {
        $produto = Produto::find($id);
        if (!is_null($produto)) {
            $produto->delete();
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Produto apagado com sucesso'];
        }
        header('Location: ' . url('/produto'));
        exit;
    }
}
