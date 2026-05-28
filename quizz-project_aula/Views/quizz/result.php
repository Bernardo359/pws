<?php $pageTitle = 'Your Result'; ?>
<?php require 'Views/layout.php'; ?>
<h1>Your Score</h1>

<p>Well done! yoou socred: <strong><?= number_format($score, 2)?></strong>points.</p>
<p>
    <a href="<?= url('/') ?>" class="btn btn-primary">PLay Again</a>
</p>