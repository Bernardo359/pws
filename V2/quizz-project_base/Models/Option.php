<?php

use Illuminate\Database\Eloquent\Model;

class Option extends Model{
    protected $fillable = ['question_id', 'option_text', 'is_correct'];
    protected $table = 'options';
    public $timestamps = false;

    public function question(){
        return $this->belongsTo(Question::class);
    }
}