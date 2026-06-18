<div class="row">
    <div class="col-6">
        <?php require __DIR__ . '/../loja/detail.php'; ?>
    </div>
    <div class="col-6">
        <div><h1>Fatura</h1></div>
        <div><h4>Número: <?= htmlspecialchars($fatura->numero) ?></h4></div>
        <div>Data: <?= $fatura->data ? $fatura->data->format('Y/m/d') : '' ?></div>
        <div>Nome cliente: <?= htmlspecialchars($fatura->nomecliente) ?></div>
        <div>Morada cliente: <?= htmlspecialchars($fatura->moradacliente) ?></div>
        <div>NIF cliente: <?= htmlspecialchars($fatura->nifcliente) ?></div>
        <div>Valor total: <?= htmlspecialchars($fatura->valortotal) ?></div>
    </div>
</div>
<br><br>
<?php
    $linhas = $fatura->linhafaturas;
    require __DIR__ . '/../linhafatura/index.php';
?>
<div>
    <a href="<?= url('/fatura/' . $fatura->id . '/linhafatura/create') ?>" class="btn btn-info" role="button">Adicionar linha</a>
</div>
