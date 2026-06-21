<?php

use Illuminate\Database\Eloquent\Model;

require_once __DIR__ . '/Fatura.php';

class Recibo extends Model
{
    protected $table = 'recibos';
    protected $fillable = ['data', 'valor', 'metodo', 'fatura_id'];
    public $timestamps = false;
    protected $casts = ['data' => 'date'];

    protected $attributes = [
        'valor' => 0,
    ];

    public function getFatura(){
        $fatura_id = $this->fatura_id;
        $fatura = Fatura::where('id', $fatura_id);
        var_dump($fatura);
        die;
        return $fatura->find('numero');
    }
}
