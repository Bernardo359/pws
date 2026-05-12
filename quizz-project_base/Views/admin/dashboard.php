<h1>Admin Dashboard</h1>

<button style="margin-left:95%"><a href="<?= url('/admin')?>">Logout</a></button>
<br>

<a href="<?= url('/admin/create') ?>">➕ Nova Pergunta</a>

<hr>

<?php foreach ($questions as $q): ?>

    <h3><?= $q->question_text ?></h3>

    <ul>
        <?php foreach ($q->options as $opt): ?>
            <li>
                <?= $opt->option_text ?>
                <?= $opt->is_correct ? '✅' : '' ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="<?= url('/admin/delete/' . $q->id) ?>">🗑️ Eliminar</a>

    <hr>

<?php endforeach; ?>