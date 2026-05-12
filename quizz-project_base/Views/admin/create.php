<h1>Nova Pergunta</h1>

<form method="POST" action="<?= url('/admin/create') ?>">

    <input type="text" name="question" placeholder="Pergunta"><br><br>

    <?php for ($i = 0; $i < 4; $i++): ?>
        <input type="text" name="options[]" placeholder="Opção <?= $i+1 ?>"><br>
    <?php endfor; ?>

    <br>

    <label>Resposta correta (0-4):</label>
    <input type="number" name="correct" min="0" max="4">

    <br><br>

    <button type="submit">Guardar</button>

</form>