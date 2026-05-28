<?php
use Illuminate\Database\Eloquent\Model;
require_once __DIR__ . '/Answer.php';


class Question extends Model
{
    protected $fillable = ['text'];
    public $timestamps = false;
    protected $table = 'questions';

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function saveAnswers($answers, $correct_index) {
      $this->answers()->delete();

      $answersData = [];
      foreach ($answers as $i => $text) {
          $answersData[] = ['text' => trim($text), 'is_correct' => ($i === $correct_index) ? 1 : 0];
      }

      $this->answers()->createMany($answersData);
    }

    public function scopePlayable($query) {
        return $query->has('answers', '>=', 2)
            ->with('answers');
    }

    public function getPoints(){
        return $this->answers()->count();
    }

    public function isAnswerCorrectly(int $selecetedAnswerId)
    {
        $correct = $this->answers->firstWhere('is_correct', 1);
        return $correct && $correct->id === $selecetedAnswerId;
    }
}