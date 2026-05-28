<?php
$pagetitle = "Quizz - Home";
?>
<?php require './Views/layout.php'; ?>
<h1>Admin Login</h1>
<form method="POST" action="<?= url('/login') ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="Passwords">Passwords:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

</body>
</html>