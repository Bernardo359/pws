<?php
use Illuminate\Database\Eloquent\Model;
require_once __DIR__ . '/Question.php';

class Answer extends Model
{
    protected $fillable = ['question_id', 'text', 'is_correct'];
    public $timestamps = false;
    protected $table = 'answers';

    public function question() {
        return $this->belongsTo(Question::class);
    }
}