<?php

use Illuminate\Database\Eloquent\Model;

class Result extends Model{
    protected $fillable = ['nome', 'score'];
    protected $table = 'results';
    public $timestamps = false;
}
