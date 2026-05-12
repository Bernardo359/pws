<h1>Quiz</h1>

<form method="POST" action="<?= url('/quiz') ?>">

    <!-- guardar o nome -->
    <input type="hidden" name="nome" value="<?= $nome ?>">

    <?php foreach ($questions as $q): ?>

        <h3><?= $q['question_text'] ?></h3>

        <?php foreach ($q['options'] as $opt): ?>

            <label>
                <input 
                    type="radio" 
                    name="question_<?= $q['id'] ?>" 
                    value="<?= $opt['id'] ?>" 
                    required
                >
                <?= $opt['option_text'] ?>
            </label><br>

        <?php endforeach; ?>

        <br>

    <?php endforeach; ?>

    <button type="submit">Submeter</button>

</form>