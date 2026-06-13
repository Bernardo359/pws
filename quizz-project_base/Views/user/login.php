<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Utilizadores</title>
</head>
<body>
    <h2>Login para Utilizadores</h2>
    <form action="<?= url('/login')?>" method="POST">
        <fieldset style="margin-right: 60%;">
            <legend>Dados de Acesso</legend>
            <br>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br><br>
            <label for="username">Password:</label>
            <input type="password" name="password" id="password" required>
            <br><br>
            <button class="btn btn-primary" type="submit" style="margin-left: 10%;">Entrar</button>
        </fieldset>
    </form>
    <?php if (!empty($_SESSION['login_error'])): ?>
        <div class="error">
            <?= $_SESSION['login_error'] ?>
        </div>
        <?php unset($_SESSION['login_error']); ?>
    <?php endif; ?>
</body>
</html>