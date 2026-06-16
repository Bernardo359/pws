<div><h1>Produto</h1></div>
<div>Referência: <?= htmlspecialchars($produto->referencia) ?></div>
<div>Descrição: <?= htmlspecialchars($produto->descricao) ?></div>
<div>Preço unitário: <?= htmlspecialchars($produto->precounitario) ?></div>

<a href="<?= url('/produto') ?>" class="btn btn-secondary" role="button">Voltar</a>
