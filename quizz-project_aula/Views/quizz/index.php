<?php $pageTitle = 'Quizz'; ?>
<?php require 'Views/layout.php'; ?>

<h1>Quizz</h1>
<form method="POST" action="<?= url('/quizz/submit') ?>">
    <?php foreach ($questions as $question): ?>
    <fieldset>
        <legend><?= htmlspecialchars($question->text) ?></legend>
        <?php foreach ($question ->answers as $answer): ?>
        <label>
            <input type="radio"
                   name="answers[<?= $question->id ?>]"
                   value="<?= $answer->id ?>">
            <?= htmlspecialchars($answer->text) ?>
        </label>
        <?php endforeach; ?>
    </fieldset>
    <?php endforeach; ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
