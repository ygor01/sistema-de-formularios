<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Question;
class Answers_pdf_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $form_id = $request->form_id;
        $question_id = $request->question_id;
        $user_id = $request->user_id;
        
        //DB::enableQueryLog();
                
                $form = Form::where('id', '=', $form_id)->get();                
                 
                $question = Question::where('form_id', $form_id)
                        ->with(array('answers' => function($query) use($user_id){
                        $query->where('user_id', '=', $user_id);
                        }))
                        ->get();
                        
                        
        //dd(DB::getQueryLog()); 
       
        
        
        
       
       return view('mostra_answers_PDF', compact('form', 'question', 'user_id'));
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
        //
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
