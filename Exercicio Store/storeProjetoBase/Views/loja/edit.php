<form method="POST" action="<?= url('/loja/edit') ?>">
    <div class="mb-2">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($loja->nome ?? '') ?>">
    </div>
    <div class="mb-2">
        <label for="nif">NIF:</label>
        <input type="number" id="nif" name="nif" value="<?= htmlspecialchars($loja->nif ?? '') ?>">
    </div>
    <div class="mb-2">
        <label for="morada">Morada:</label>
        <input type="text" id="morada" name="morada" value="<?= htmlspecialchars($loja->morada ?? '') ?>">
    </div>
    <div class="mb-2">
        <label for="telefone">Telefone:</label>
        <input type="number" id="telefone" name="telefone" value="<?= htmlspecialchars($loja->telefone ?? '') ?>">
    </div>
    <div class="mb-2">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($loja->email ?? '') ?>">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
