<form method="POST" action="<?= url('/recibo') ?>">
    <div class="mb-2">
        <label for="fatura_id">Numero da Fatura:</label>
        <input type="number" id="fatura_id" name="fatura_id" value="<?= htmlspecialchars($recibo->fatura_id ?? '') ?>">
    </div>
    <div class="mb-2">
        <label for="metodo">Método de Pagamento:</label>
        <select id="metodo" name="metodo">
            <option id="Efetivo" >Efetivo</option>
            <option id="card" >Cartão de Débito/Crédito</option>
            <option id="mbway" >MbWay</option>
        </select>
    </div>
    <div class="mb-2">
        <label for="valor">Valor: </label>
        <input type="number" id="valor" name="valor" value="<?= htmlspecialchars($recibo->valor ?? '') ?>">
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
</form>
