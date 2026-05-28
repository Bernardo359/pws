<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle;?></title>
</head>
<body>
    <h1>Registar Utilizador</h1>
    <div class="form-register">
        <form action="<?= url('/register')?>" method="POST">
            <fieldset style="margin-right: 60%;">
                <legend>Dados de Acesso</legend>
                <br>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <br><br>
                <label for="username">Password:</label>
                <input type="text" name="password" id="password" required>
                <br><br>
                <label for="isAdmin">Admin</label>
                <br>
                <label for="isAdmin">Sim?</label>
                <input type="radio" id="isAdmin" name="isAdmin" value="1" >
                <label for="isAdmin">Não?</label>
                <input type="radio" id="isAdmin" name="isAdmin" value="0" checked>
                <br><br>
                <button class="btn btn-primary" type="submit" style="margin-left: 10%;">Registar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>