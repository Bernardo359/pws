<?php

require_once __DIR__ . '/../Models/Loja.php';

class LojaController
{
    public function show()
    {
        $loja = Loja::find(1);
        $pageTitle = 'Loja';
        $contentView = __DIR__ . '/../Views/loja/show.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function create()
    {
        $pageTitle = 'Criar loja';
        $contentView = __DIR__ . '/../Views/loja/create.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function store()
    {
        try {
            Loja::create([
                'nome'     => $_POST['nome'] ?? null,
                'nif'      => $_POST['nif'] ?? null,
                'morada'   => $_POST['morada'] ?? null,
                'telefone' => $_POST['telefone'] ?? null,
                'email'    => $_POST['email'] ?? null,
            ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Loja criada com sucesso'];
            header('Location: ' . url('/loja'));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao criar loja'];
            header('Location: ' . url('/loja/create'));
            exit;
        }
    }

    public function edit()
    {
        $loja = Loja::find(1);
        if (is_null($loja)) {
            header('Location: ' . url('/loja'));
            exit;
        }
        $pageTitle = 'Editar loja';
        $contentView = __DIR__ . '/../Views/loja/edit.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function update()
    {
        $loja = Loja::find(1);
        if (is_null($loja)) {
            header('Location: ' . url('/loja'));
            exit;
        }
        try {
            $loja->update([
                'nome'     => $_POST['nome'] ?? null,
                'nif'      => $_POST['nif'] ?? null,
                'morada'   => $_POST['morada'] ?? null,
                'telefone' => $_POST['telefone'] ?? null,
                'email'    => $_POST['email'] ?? null,
            ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Loja atualizada com sucesso'];
            header('Location: ' . url('/loja'));
            exit;
        } catch (\Exception $ex) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Erro ao atualizar loja'];
            header('Location: ' . url('/loja/edit'));
            exit;
        }
    }
}
