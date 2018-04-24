<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Form;
use App\Question;

class Admin_QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        //$request->session()->forget('form_select');        
        $form_id = $request->form_select;
        $user_id = $request->form_select_user;    
        $form = Form::with('questions', 'questions.options')->where('id', $form_id)->get();
        $question_count = Question::where('form_id', $form_id)->count();
        
        return view('admin/questions', compact('form_id', 'user_id', 'form', 'question_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $form_id = $request->form_id;
        $question_id = $request->question_id;
        $order = $request->order;
        $form = Form::with('questions')->where('id', $form_id)->get(); 
        foreach ($form as $forms){
            foreach ($forms->questions as $questions){
                $question_id = $questions->id; //OBS: colocar depois pra popular question_id em cada questao no question.blade
            }
        }
        return view('admin/cadastra_question', compact('form', 'order', 'form_id', 'question_id'));
    }
    

    public function store(Request $request)
    {       
        if($request->select_type == 'Mult'){   

            $question = Question::create([
                'type' => $request->select_type,
                'title' => $request->title,
                'order' => $request->order,
                'form_id' => $request->form_id
                ]);
            
            $form_id = $request->form_id;
            $question_title = $request->title;
            $question_id = $request->question_id;
            $question = Question::where('questions.form_id', $form_id)->get();
            
            return redirect()->route('new_option', compact('form_id', 'question_id'));
        }
        elseif($request->select_type == 'Check'){

            $question = Question::create([
                'type' => $request->select_type,
                'title' => $request->title,
                'order' => $request->order,
                'form_id' => $request->form_id
                ]);

            $form_id = $request->form_id;
            $question_id = $request->question_id;
            $question = Question::where('questions.form_id', $form_id)->get();
            
            return redirect()->route('new_check', compact('form_id', 'form_id', 'question_id'));
        }
        else{
            $question = Question::create([
            'type' => $request->select_type,
            'title' => $request->title,
            'order' => $request->order,
            'form_id' => $request->form_id
            ]);
            return redirect()->route('question_get', ['form_select' => $request->form_id]);
        }
        //$form_id = $request->form_id;
        
        
        //dd($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
