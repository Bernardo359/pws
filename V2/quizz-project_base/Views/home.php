<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= url('/public/css/styles.css') ?>">
        <link rel="stylesheet" href="<?= url('/public/css/home.css') ?>">
        <title>HOME</title>
    </head>

    <body>
        <div class="container">
            <h1 class="title-home">Bem-Vindo ao Quiz</h1>

            <form method="GET" action="<?= url('/quizz') ?>">
                <input class="input-name" type="text" name="nome" placeholder="O teu nome" required>
                <button type="submit">Começar</button>
            </form>
        </div>
    </body>

</html>