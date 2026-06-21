<div class="row">
    <div class="col-4">
        <?php require __DIR__ . '/../loja/detail.php'; ?>
    </div>
    <div class="col-4">
        <div><h1>Recibo de Pagamento</h1></div>
        <div><h4>Número: <?= htmlspecialchars($recibo->id) ?></h4></div>
        <div><h4>Fatura: <?= htmlspecialchars($recibo->fatura_id) ?></h4></div>
        <div>Data: <?= $recibo->data ? $recibo->data->format('Y/m/d') : '' ?></div>
        <div>Nome cliente: <?= htmlspecialchars($fatura->nomecliente) ?></div>
        <div>Método de Pagamento: <?= htmlspecialchars($recibo->metodo) ?></div>
        <div>NIF cliente: <?= htmlspecialchars($fatura->nifcliente) ?></div>
        <div>Valor total: <?= htmlspecialchars($recibo->valor) ?>$</div>
    </div>
</div>
<br><br>
<?php
    $linhas = $fatura->linhafaturas;
    require __DIR__ . '/../linhafatura/index.php';
?>
