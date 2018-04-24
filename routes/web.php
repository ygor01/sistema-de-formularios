<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/welcome', function() {
return View('test');    
});

Route::post('admin/questions', 'Admin\Admin_QuestionController@index')->name('admin_question_post');
Route::get('admin/questions', 'Admin\Admin_QuestionController@index')->name('admin_question_get');

Route::get('/grafico', function() {
return View('grafico');    
});

Route::get('/menu', function() {
    return View('Admin/menu_teste');    
    });





Route::get('admin/form', 'Admin\Admin_FormController@index')->name('form_admin');
Route::get('form', 'FormController@index')->name('form');

Route::get('admin/newform', 'Admin\Admin_FormController@create');

Route::get('admin/newquestion', 'Admin\Admin_QuestionController@create')->name('admin_new_question');
//Route::get('newquestion', 'QuestionController@create')->name('new_question');
Route::get('admin/newoption', 'Admin\Admin_OptionController@create')->name('new_option');


Route::get('admin/newcheck', 'Admin\Admin_CheckController@create')->name('new_check');
Route::post('insert_form', 'FormController@store');

Route::post('admin/insert_question', 'Admin\Admin_QuestionController@store');

Route::post('admin/insert_option', 'Admin\Admin_OptionController@store');
Route::post('insert_answers', 'AnswersController@store');
Route::get('answers', 'AnswersController@index');
Route::get('answers_pdf', 'Answers_pdf_Controller@index');
Route::get('admin', 'ListaController@index')->middleware('auth');

//Route::get('banco', 'QuestionsController@index');
//Route::post('cadform', 'FormController@store');

//Route::post('admin/questions', 'Admin\Admin_QuestionController@index')->name('admin_question_post');
Route::post('questions', 'QuestionController@index')->name('question_post');

Route::get('questions', 'QuestionController@index')->name('question_get');




Route::get('/home', 'HomeController@index')->name('home');
