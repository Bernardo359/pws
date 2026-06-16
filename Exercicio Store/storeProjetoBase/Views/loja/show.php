<?php if (!is_null($loja)): ?>
    <?php require __DIR__ . '/detail.php'; ?>
    <a href="<?= url('/loja/edit') ?>" class="btn btn-info" role="button">Editar loja</a>
<?php else: ?>
    <div>Não existe loja criada</div>
    <a href="<?= url('/loja/create') ?>" class="btn btn-info" role="button">Criar loja</a>
<?php endif; ?>
