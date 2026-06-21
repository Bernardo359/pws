<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle ?? 'Gestor faturas') ?></title>
    <link href="<?= url('/public/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= url('/') ?>">Gestor faturas</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= url('/loja') ?>">Loja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= url('/fatura') ?>">Faturas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= url('/recibo') ?>">Recibos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= url('/produto') ?>">Produtos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3">
    <?php if (isset($_SESSION['flash'])): ?>
        <?php $flash = $_SESSION['flash']; unset($_SESSION['flash']); ?>
        <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'danger' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <?php require $contentView; ?>
</div>

<script src="<?= url('/public/js/bootstrap.js') ?>"></script>
</body>
</html>
