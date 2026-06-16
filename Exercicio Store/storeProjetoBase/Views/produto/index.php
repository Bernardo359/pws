<h2 class="text-left top-space">Produtos</h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><h3>Referência</h3></th>
                    <th><h3>Descrição</h3></th>
                    <th><h3>Preço unitário</h3></th>
                    <th><h3>Ações</h3></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= htmlspecialchars($produto->referencia) ?></td>
                    <td><?= htmlspecialchars($produto->descricao) ?></td>
                    <td><?= htmlspecialchars($produto->precounitario) ?></td>
                    <td>
                        <a href="<?= url('/produto/' . $produto->id . '/edit') ?>" class="btn btn-info" role="button">Editar</a>
                        <a href="<?= url('/produto/' . $produto->id . '/delete') ?>" class="btn btn-warning" role="button">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <a href="<?= url('/produto/create') ?>" class="btn btn-info" role="button">Criar</a>
    </div>
</div>
