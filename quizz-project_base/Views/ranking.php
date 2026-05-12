<h1>🏆 Top 10</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Posição</th>
        <th>Nome</th>
        <th>Pontuação</th>
    </tr>

    <?php $pos = 1; ?>

    <?php foreach ($results as $r): ?>
        <tr>
            <td><?= $pos++ ?></td>
            <td><?= $r->nome ?></td>
            <td><?= $r->score ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<br>

<a href="<?= url('/') ?>">Voltar</a>