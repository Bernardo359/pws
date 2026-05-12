<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url('/public/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= url('/public/css/quizz.css') ?>">
    <title>Quizz</title>
</head>

<body>
    <h1>Quizz</h1>

    <form method="POST" action="<?= url('/quizz') ?>">

        <input type="hidden" name="nome" value="<?= $nome ?>">


        <?php foreach ($questions as $q): ?>
            <div class="container">
                <h3><?= $q['question_text'] ?></h3>

                <?php foreach ($q['options'] as $opt): ?>

                    <label>
                        <input type="radio" name="question_<?= $q['id'] ?>"
                            value="<?= $opt['id'] ?>" required>
                        <?= $opt['option_text'] ?>
                    </label>
                    <br>
                <?php endforeach; ?>

                <br>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn-submit">Submeter</button>
    </form>
</body>

</html>