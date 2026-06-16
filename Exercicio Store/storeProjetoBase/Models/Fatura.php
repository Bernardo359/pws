<?php

use Illuminate\Database\Eloquent\Model;

require_once __DIR__ . '/Linhafatura.php';

class Fatura extends Model
{
    protected $table = 'faturas';
    protected $fillable = ['numero', 'data', 'nomecliente', 'moradacliente', 'nifcliente', 'valortotal'];
    public $timestamps = false;
    protected $casts = ['data' => 'date'];

    protected $attributes = [
        'valortotal' => 0
    ];

    public function linhafaturas()
    {
        return $this->hasMany(Linhafatura::class);
    }

    public function updateTotal($value)
    {
        $this->valortotal = ($this->valortotal ?? 0) + $value;
        $this->save();
    }

    public function generateNumber()
    {
        $last = Fatura::orderBy('numero', 'desc')->first();
        $this->numero = $last ? $last->numero + 1 : 1;
    }
}
