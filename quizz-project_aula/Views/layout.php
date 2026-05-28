<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=htmlspecialchars($pageTitle ?? 'Quizz App') ?></title>
    <style>
        body { font-family: sans-serif; max-width: 900px; margin: 0 auto; padding: 20px; }
        nav { margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #ccc; }
        nav a { margin-right: 15px; text-decoration: none; color: #333; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px 12px; border: 1px solid #ddd; }
        th { background: #f4f4f4; }
        .homePageButton {color: #007bff; font-family: cursive; font-weight: bold; }
        .flash { padding: 10px 15px; margin-bottom: 15px; border-radius: 4px; }
        .flash--success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .flash--error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .btn { display: inline-block; padding: 6px 12px; text-decoration: none; border: 1px solid #ccc;
            background: #fff; cursor: pointer; border-radius: 3px; font-size: 14px; }
        .btn-primary { background: #007bff; color: #fff; border-color: #007bff; }
        .btn-danger { background: #dc3545; color: #fff; border-color: #dc3545; }
        .btn-sucess { background: forestgreen; color: #fff; border-color: forestgreen; }
        form.inline { display: inline; }
        label { display: block; margin-bottom: 4px; font-weight: bold; }
        input[type="text"], input[type="password"], textarea { width: 100%; padding: 6px; box-sizing: border-box; margin-bottom: 12px; }
        textarea { height: 80px; }
        fieldset { border: 1px solid #ccc; padding: 12px 16px; margin-bottom: 12px; }
        fieldset legend { font-weight: bold; padding: 0 6px; }
        .answer-row { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
        .answer-row input[type="radio"] { width: auto; margin: 0; flex-shrink: 0; }
        .answer-row input[type="text"] { flex: 1; margin-bottom: 0; }
    </style>
</head>
<body>
<nav>
    <a href="<?= url('/') ?>" class="homePageButton">Quizz</a>
    <?php if(Auth::check()): ?>
        <a href="<?= url('/admin/questions') ?>">Questions</a>
        <form method="POST" action="<?= url('/logout') ?>" class="inline">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    <?php else: ?>
        <a href="<?= url('/login') ?>" class="btn btn-sucess">Admin Login</a>
    <?php endif; ?>
</nav>
<?php
if(isset($_SESSION['flash'])){
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    echo "
    <div class='flash flash--{$flash['type']}'>{$flash['message']}</div>";
    echo '<br>';
}
?>