<?php

use Illuminate\Database\Eloquent\Model;

require_once __DIR__ . '/Fatura.php';
require_once __DIR__ . '/Produto.php';

class Linhafatura extends Model
{
    protected $table = 'linhafaturas';
    protected $fillable = ['quantidade', 'subtotal', 'fatura_id', 'produto_id'];
    public $timestamps = false;

    public function fatura()
    {
        return $this->belongsTo(Fatura::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function saveWithSubtotal()
    {
        $this->subtotal = $this->quantidade * $this->produto->precounitario;
        $this->save();
        $this->updateInvoiceValue($this->subtotal);
    }

    public function deleteLine()
    {
        $subtotal = $this->subtotal;
        $faturaId = $this->fatura_id;
        $this->delete();
        Fatura::find($faturaId)->updateTotal(-$subtotal);
    }

    private function updateInvoiceValue($value)
    {
        Fatura::find($this->fatura_id)->updateTotal($value);
    }
}
