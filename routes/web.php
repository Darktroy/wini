<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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



Route::middleware('auth:web')->group(function(){
        Route::group(['prefix' => 'questions',], function () {
            
            Route::get('', 'QuestionsController@index')->name('questions.questions.index');
        //    Route::get('/', 'QuestionsController@index')->name('questions.questions.index');
        //
            Route::get('/create','QuestionsController@create')->name('questions.questions.create');
            Route::get('/createImage','QuestionsController@createImage')->name('questions.questions.createImage');

            Route::get('/show/{questions}','QuestionsController@show')->name('questions.questions.show')->where('id', '[0-9]+');

            Route::get('/{questions}/edit','QuestionsController@edit')->name('questions.questions.edit')->where('id', '[0-9]+');

            Route::post('/', 'QuestionsController@store')->name('questions.questions.storenormal');
            Route::post('/imageQestion', 'QuestionsController@storeImage')->name('questions.questions.store');

            Route::put('questions/{questions}', 'QuestionsController@update')->name('questions.questions.update')->where('id', '[0-9]+');

            Route::delete('/questions/{questions}','QuestionsController@destroy')->name('questions.questions.destroy')->where('id', '[0-9]+');

//        dd('50 '.__FILE__);
        });

    
});
Auth::routes();
Route::group(['prefix' => 'q_answers',], function () {

    Route::get('/', 'QAnswersController@index')
         ->name('q_answers.q_answer.index');

    Route::get('/create','QAnswersController@create')
         ->name('q_answers.q_answer.create');

    Route::get('/show/{qAnswer}','QAnswersController@show')
         ->name('q_answers.q_answer.show')
         ->where('id', '[0-9]+');

    Route::get('/{qAnswer}/edit','QAnswersController@edit')
         ->name('q_answers.q_answer.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'QAnswersController@store')
         ->name('q_answers.q_answer.store');
               
    Route::put('q_answer/{qAnswer}', 'QAnswersController@update')
         ->name('q_answers.q_answer.update')
         ->where('id', '[0-9]+');

    Route::delete('/q_answer/{qAnswer}','QAnswersController@destroy')
         ->name('q_answers.q_answer.destroy')
         ->where('id', '[0-9]+');

});

Route::group([ 'prefix' => 'question_to_users',], function () {

    Route::get('/', 'QuestionToUsersController@index')
         ->name('question_to_users.question_to_user.index');

    Route::get('/create','QuestionToUsersController@create')
         ->name('question_to_users.question_to_user.create');

    Route::get('/show/{questionToUser}','QuestionToUsersController@show')
         ->name('question_to_users.question_to_user.show')
         ->where('id', '[0-9]+');

    Route::get('/{questionToUser}/edit','QuestionToUsersController@edit')
         ->name('question_to_users.question_to_user.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'QuestionToUsersController@store')
         ->name('question_to_users.question_to_user.store');
               
    Route::put('question_to_user/{questionToUser}', 'QuestionToUsersController@update')
         ->name('question_to_users.question_to_user.update')
         ->where('id', '[0-9]+');

    Route::delete('/question_to_user/{questionToUser}','QuestionToUsersController@destroy')
         ->name('question_to_users.question_to_user.destroy')
         ->where('id', '[0-9]+');

});
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/home', 'HomeController@index')->name('home');