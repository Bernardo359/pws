<?php

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    public $timestamps = false;

    protected $fillable = ['nome', 'score'];

    public static function top10(){
        return self::orderBy('score', 'desc')
                ->limit(10)
                ->get();
    }
}