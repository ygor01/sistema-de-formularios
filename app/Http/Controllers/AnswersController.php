<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Question;
use App\Form;
use Illuminate\Http\Request;
use DB;
//use Dompdf\Dompdf;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
            
            
    {
        
       
        $form_id = $request->form_id;
        $user_id = $request->user_id;
       
        $form = Form::where('id', '=', $form_id)->get();                
                 
        $question = Question::where('form_id', $form_id)
            ->with(array('answers' => function($query) use($user_id){
            $query->where('user_id', '=', $user_id);
            }))->get();
        $question_count = $question->count();
        
//        foreach($question as $questions){
//            echo "$questions->title<br>";
//            foreach($questions->answers as $answers){
//                echo "$answers->answer<br>";
//            }
//        }
        
        return view('mostra_answers', compact('form_id', 'user_id', 'form', 'question', 'question_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $answer = $request->answer;
        $question_id = $request->question_id;
        $user_id = $request->user_id;
        $form_id = $request->form_id;
        //echo $answer[3];
        foreach ($answer as $key => $answers){
            
            if(is_array($answers)){
                foreach($answers as $check){ 
                    $option = Answers::create([ 
                    'answer' => $check,
                    'question_id' => $question_id[$key],
                    'user_id' => $user_id,
                    'form_id' => $form_id
                    ]);   
                }
            }
            else{
                
                   
                    $option = Answers::create([ 
                    'answer' => $answers,
                    'question_id' => $question_id[$key],
                    'user_id' => $user_id,
                    'form_id' => $form_id

                ]); 

                   
                    
            }
        
        /*foreach($answer as $key => $answers){
            if(is_array($answers)){
              echo "question[$key] <br>";
              foreach($answers as $check){
                  echo " ---- $check <br>";
              }
            }
            
            else{
              echo $answers ."<br>";
              //echo "question[$key] Não possui array <br>";
            }
              
        }  */
            
     }   
        if($option){
            return redirect()->route('question_get', ['form_select' => $request->form_id, 'info_status' => 'true', 'form_select_user' => $request->user_id]);
            
        }
        else{
            return redirect()->route('question_get', ['form_select' => $request->form_id, 'info_status' => 'false']);
        }
           
            
               
             

                    
            
        
        
        
        //$questions = $request->all();
        //$option = Answers::create($questions);
        //return redirect()->route('question_get', ['form_select' => $request->form_id]);
        
        
    
    
    }         

    /**
     * Display the specified resource.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function show(answers $answers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(answers $answers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, answers $answers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(answers $answers)
    {
        //
    }
}
