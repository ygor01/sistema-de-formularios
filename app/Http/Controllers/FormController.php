<?php

namespace App\Http\Controllers;
//use DB;
use Illuminate\Http\Request;
use App\Form;
use App\User;
use Carbon\Carbon;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
      
      $form = Form::orderBy('id', 'DESC')->get();    
      //$form_id = DB::table('form')->where('title', 'Formulario 2')->pluck('id');
      $user = User::get();
      return view('form', compact('form', 'user'));
      //return view('questions', compact('form', 'question') );

    //SELECT count(*) as teste from answers where user_id = 2 and form_id = 41; 
    //para validar se o usuario ja respondeu tal formulario
    // se a coluna count for maior q 0, então o usuario nao podera mais responder.

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cadastra_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $date_now = Carbon::now();
        $initial_date = $date_now->toDateString();
        $final_date = $date_now->addDay(10)->toDateString();
        $form = Form::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'initial_date' => $initial_date,
            'final_date' => $final_date,
            'qnt_recept' => '2',
            'status' => '1',
            'description' => $request->input('description'),
        ]);
        
        if($form){
            return redirect()->route('form');
        }
        else{
            return redirect()->route('cadastra_form');
        }
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
