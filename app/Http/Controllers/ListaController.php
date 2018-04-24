<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answers;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
       /* $form = Answers::select('forms.id as form_id', 'forms.status as status', 'forms.title as formulario', 
        'users.name as entrevistado', 'users.cpf as cpf', 'questions.id as question_id', 'users.id as user_id',
        'forms.final_date')
                ->join('questions', 'question_id', 'questions.id')
                ->join('users', 'user_id', 'users.id')
                ->join('forms', 'answers.form_id', 'forms.id')->groupBy('form_id', 'users.cpf')->get();
        $form_count = $form->count();*/

        $form = Answers::select('forms.id as form_id', 'forms.status as status', 'forms.title as formulario', 
        'users.name as entrevistado', 'users.cpf as cpf', 'questions.id as question_id', 'users.id as user_id',
        'forms.final_date')
                ->join('questions', 'question_id', 'questions.id')
                ->join('users', 'user_id', 'users.id')
                ->join('forms', 'answers.form_id', 'forms.id')->groupBy('form_id', 'users.cpf')->get();
        $form_count = $form->count();

        return view('admin/lista', compact('form', 'form_count'));
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
