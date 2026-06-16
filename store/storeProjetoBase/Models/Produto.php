<?php

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['descricao', 'referencia', 'precounitario'];
    public $timestamps = false;
}
