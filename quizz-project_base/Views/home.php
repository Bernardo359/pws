<h1>Bem-vindo ao Quiz</h1>

<form method="GET" action="<?= url('/quiz') ?>">
    <input type="text" name="nome" placeholder="O teu nome" required>
    <button type="submit">Começar</button>
</form>

<a href="<?= url('/ranking') ?>">Ver Top 10</a>

<br>
<br>

<a href="<?= url('/admin') ?>">Login para administradores</a>
<br><br>
<a href="<?= url('/register') ?>">Registe-se</a>