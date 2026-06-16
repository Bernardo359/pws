<table class="table table-striped">
    <thead>
        <tr>
            <th><h3>Produto</h3></th>
            <th><h3>Quantidade</h3></th>
            <th><h3>Subtotal</h3></th>
            <th><h3>Ações</h3></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($linhas as $linha): ?>
        <tr>
            <td><?= htmlspecialchars($linha->produto->descricao) ?></td>
            <td><?= htmlspecialchars($linha->quantidade) ?></td>
            <td><?= htmlspecialchars($linha->subtotal) ?></td>
            <td>
                <a href="<?= url('/linhafatura/' . $linha->id . '/delete') ?>" class="btn btn-warning" role="button">Apagar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
