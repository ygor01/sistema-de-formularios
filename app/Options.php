<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;

class Options extends Model
{
    protected $fillable = ['title', 'question_id'];
    
    public $timestamps = false;
    
}
