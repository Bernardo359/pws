<form method="POST" action="<?= url('/produto/' . $produto->id) ?>">
    <div class="mb-2">
        <label for="referencia">Referência:</label>
        <input type="number" id="referencia" name="referencia" value="<?= htmlspecialchars($produto->referencia) ?>">
    </div>
    <div class="mb-2">
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?= htmlspecialchars($produto->descricao) ?>">
    </div>
    <div class="mb-2">
        <label for="precounitario">Preço unitário:</label>
        <input type="number" step=".01" min="0.01" max="99999.99" id="precounitario" name="precounitario" value="<?= htmlspecialchars($produto->precounitario) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
