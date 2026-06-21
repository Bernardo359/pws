<div class="row">
    <div class="col-4">
        <?php require __DIR__ . '/../loja/detail.php'; ?>
    </div>
    <div class="col-4">
        <div><h1>Fatura</h1></div>
        <div><h4>Número: <?= htmlspecialchars($fatura->numero) ?></h4></div>
        <div>Data: <?= $fatura->data ? $fatura->data->format('Y/m/d') : '' ?></div>
        <div>Nome cliente: <?= htmlspecialchars($fatura->nomecliente) ?></div>
        <div>Morada cliente: <?= htmlspecialchars($fatura->moradacliente) ?></div>
        <div>NIF cliente: <?= htmlspecialchars($fatura->nifcliente) ?></div>
        <div>Valor total: <?= htmlspecialchars($fatura->valortotal) ?></div>
    </div>
    <?php if($fatura->estado == 'Em Elaboração'):?>
    <div class="col-4">
        <form method="POST" action="<?= url('/fatura/' . $fatura->id . '/emitir') ?>">
            <button name="btn-emitir" type="submit" id="btn-emitir" style="margin-right: 3%; font-size: 20px" value="emitir">Emitir</button>
        </form>
        <form method="POST" action="<?= url('/fatura/' . $fatura->id . '/cancelar') ?>">
            <button name="btn-cancelar" id="btn-emitir" style="font-size: 20px" value="cancelar">Cancelar</button>
        </form>
    </div>
    <?php endif;?>

    <?php if($fatura->estado == 'Emitida'):?>
    <div class="col-4">
        <form method="POST" action="<?= url('/criarRecibo') ?>">
            <input type="hidden" name="fatura_id" value="<?= $fatura->id ?>">
            <button name="btn-recibo" type="submit" id="btn-recibo" style="margin-right: 3%; font-size: 20px" value="recibo">Emitir Recibo</button>
        </form>
    </div>
    <?php endif;?>
</div>
<br><br>
<?php
    $linhas = $fatura->linhafaturas;
    require __DIR__ . '/../linhafatura/index.php';
?>
<div>
    <a href="<?= url('/fatura/' . $fatura->id . '/linhafatura/create') ?>" class="btn btn-info" role="button">Adicionar linha</a>
</div>
