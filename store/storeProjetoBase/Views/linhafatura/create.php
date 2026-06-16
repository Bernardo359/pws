<form method="POST" action="<?= url('/linhafatura') ?>">
    <div class="mb-2">
        <label for="produto_id">Produto:</label>
        <select id="produto_id" name="produto_id">
            <?php foreach ($produtos as $produto): ?>
                <?php $selected = isset($linha) && $linha->produto_id == $produto->id ? 'selected' : ''; ?>
                <option value="<?= $produto->id ?>" <?= $selected ?>><?= htmlspecialchars($produto->descricao) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-2">
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" step="1" min="1" max="999" value="<?= htmlspecialchars($linha->quantidade ?? '') ?>">
    </div>
    <input type="hidden" name="fatura_id" value="<?= $fatura_id ?>">
    <button type="submit" class="btn btn-primary">Criar</button>
</form>
