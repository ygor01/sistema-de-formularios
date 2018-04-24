<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $form = Form::join('questions', 'questions.form_id', '=', 'forms.id')
                ->where('forms.id', $form_id)->where('questions.id', $question_id)
                ->select('forms.title as form_title', 'questions.title as question_title')
                ->get();
        //$form = Form::join('questions', 'questions.form_id', '=', 'forms.id')->where('questions.id', '98')->get();
        
        
        
        return view('cadastra_check', compact('form', 'form_id', 'question_id'));
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
