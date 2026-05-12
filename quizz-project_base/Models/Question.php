<?php

use Illuminate\Database\Eloquent\Model;

class Question extends Model{
    protected $fillable = ['question_text'];
    protected $table = 'questions';
    public $timestamps = false;

    public function options(){
        return $this->hasMany(Option::class);
    }
}