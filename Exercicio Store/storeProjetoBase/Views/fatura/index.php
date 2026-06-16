<h2 class="text-left top-space">Faturas</h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><h3>Número</h3></th>
                    <th><h3>Data</h3></th>
                    <th><h3>Nome cliente</h3></th>
                    <th><h3>Morada cliente</h3></th>
                    <th><h3>NIF cliente</h3></th>
                    <th><h3>Valor total</h3></th>
                    <th><h3>Ações</h3></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($faturas as $fatura): ?>
                <tr>
                    <td><?= htmlspecialchars($fatura->numero) ?></td>
                    <td><?= $fatura->data ? $fatura->data->format('Y/m/d') : '' ?></td>
                    <td><?= htmlspecialchars($fatura->nomecliente) ?></td>
                    <td><?= htmlspecialchars($fatura->moradacliente) ?></td>
                    <td><?= htmlspecialchars($fatura->nifcliente) ?></td>
                    <td><?= htmlspecialchars($fatura->valortotal) ?></td>
                    <td>
                        <a href="<?= url('/fatura/' . $fatura->id) ?>" class="btn btn-info" role="button">Ver</a>
                        <a href="<?= url('/fatura/' . $fatura->id . '/edit') ?>" class="btn btn-info" role="button">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <a href="<?= url('/fatura/create') ?>" class="btn btn-info" role="button">Criar</a>
    </div>
</div>
