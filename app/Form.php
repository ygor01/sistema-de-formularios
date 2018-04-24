<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;
use App\User;
use App\Answers;

class Form extends Model
{
    
    protected $fillable = ['title', 'author', 'initial_date', 'final_date', 'qnt_recept', 'status', 'description'];




    public $timestamps = false;
    
    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function answers(){
        return $this->hasMany(Answers::class);
    }
    
    public function users(){
        return $this->hasMany(User::class);
    }
    
    
}
