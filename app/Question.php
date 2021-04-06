<?php

namespace App;

use App\Exceptions\AnswerAlreadyOnQuestion;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'hint'];

    public function plest()
    {
        return $this->belongsTo(Plest::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    public function add(Answer $answer)
    {
        if ( ! is_null($answer->question_id)) {
            throw new AnswerAlreadyOnQuestion;
        }

        $this->answers()->save($answer);
        
        return $answer;
    }

    public function countAnswers()
    {
        return count($this->answers);
    }

    public function attempt($answer_id)
    {
        $attempt = new Attempt([
            'answer_id' => $answer_id,
            'user_id' => Auth::user()->id,
        ]);

        $this->attempts()->save($attempt);
    }
}
