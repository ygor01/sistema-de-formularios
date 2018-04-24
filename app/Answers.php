<?php

namespace App;
use App\Question;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = ['_token', 'answer', 'question_id', 'user_id', 'form_id'];

    public $timestamps = false;
    
    public function questions(){
        return $this->hasOne(Question::class);
    }
    
    public function users(){
        return $this->hasOne(User::class);
    }
}
