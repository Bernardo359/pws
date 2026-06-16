<?php

use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    protected $table = 'lojas';
    protected $fillable = ['nome', 'nif', 'morada', 'telefone', 'email'];
    public $timestamps = false;
}
