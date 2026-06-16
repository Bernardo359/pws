<form method="POST" action="<?= url('/fatura') ?>">
    <div class="mb-2">
        <label for="nomecliente">Nome cliente:</label>
        <input type="text" id="nomecliente" name="nomecliente" value="<?= htmlspecialchars($fatura->nomecliente ?? '') ?>">
    </div>
    <div class="mb-2">
        <label for="moradacliente">Morada cliente:</label>
        <input type="text" id="moradacliente" name="moradacliente" value="<?= htmlspecialchars($fatura->moradacliente ?? '') ?>">
    </div>
    <div class="mb-2">
        <label for="nifcliente">NIF cliente:</label>
        <input type="number" id="nifcliente" name="nifcliente" value="<?= htmlspecialchars($fatura->nifcliente ?? '') ?>">
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
</form>
