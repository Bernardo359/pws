<form method="POST" action="<?= url('/fatura/' . $fatura->id) ?>">
    <div class="mb-2">
        <label for="nomecliente">Nome cliente:</label>
        <input type="text" id="nomecliente" name="nomecliente" value="<?= htmlspecialchars($fatura->nomecliente) ?>">
    </div>
    <div class="mb-2">
        <label for="moradacliente">Morada cliente:</label>
        <input type="text" id="moradacliente" name="moradacliente" value="<?= htmlspecialchars($fatura->moradacliente) ?>">
    </div>
    <div class="mb-2">
        <label for="nifcliente">NIF cliente:</label>
        <input type="number" id="nifcliente" name="nifcliente" value="<?= htmlspecialchars($fatura->nifcliente) ?>">
    </div>
    <div class="mb-2">
        <label for="nomecliente">Estado da Fatura:</label>
        <select id="estado" name="nomecliente" value="<?= htmlspecialchars($fatura->estado) ?>">
            <option>Em Elaboração</option>
            <option>Emitida</option>
            <option>Paga</option>
            <option>Cancelada</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
