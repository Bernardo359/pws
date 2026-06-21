<h2 class="text-left top-space">Recibos</h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><h3>Recibo</h3></th>
                    <th><h3>Fatura</h3></th>
                    <th><h3>Data</h3></th>
                    <th><h3>Método</h3></th>
                    <th><h3>Valor</h3></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($recibos as $recibo): ?>
                <tr>
                    <td><?= htmlspecialchars($recibo->id) ?></td>
                    <td><?= htmlspecialchars($recibo->fatura_id) ?></td>
                    <td><?= $recibo->data ? $recibo->data->format('Y/m/d') : '' ?></td>
                    <td><?= htmlspecialchars($recibo->metodo) ?></td>
                    <td><?= htmlspecialchars($recibo->valor) ?></td>
                    <td>
                        <a href="<?= url('/recibo/' . $recibo->id) ?>" class="btn btn-info" role="button">Ver</a>
                        <a href="<?= url('/recibo/' . $recibo->id . '/edit') ?>" class="btn btn-info" role="button">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <a href="<?= url('/recibo/create') ?>" class="btn btn-info" role="button">Criar Recibo</a>
    </div>
</div>
