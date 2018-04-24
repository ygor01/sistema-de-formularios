<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Form;
use App\Options;
use App\Answers;

class Question extends Model
{
    
    protected $fillable = ['type', 'title', 'order', 'form_id'];
    
    public $timestamps = false;
    
    public function form(){
        return $this->hasOne(Form::class);
    }
    
    public function options(){
        return $this->hasMany(Options::class);
    }
    
    public function answers(){
        return $this->hasMany(Answers::class);
    }
    
    
}
