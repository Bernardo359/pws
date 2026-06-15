<h1>Login Admin</h1>
<button style="margin-left: 90%;"><a href="<?= url('/') ?>">Página Inicial</a></button>

<form method="POST" action="<?= url('/admin') ?>">
    <input type="text" name="username" placeholder="User"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Entrar</button>
</form>
<?php if (!empty($_SESSION['login_error'])): ?>
    <div class="error">
        <?= $_SESSION['login_error'] ?>
    </div>
    <?php unset($_SESSION['login_error']); ?>
<?php endif; ?>