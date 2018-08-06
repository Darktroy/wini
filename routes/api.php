<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//use Illuminate\Http\Request;
Route::post('login', 'API\AuthController@login');
Route::post('login-by-mobile', 'API\AuthController@loginMobile');
Route::post('register', 'API\AuthController@register');
Route::post('register-mobile', 'API\AuthController@registerMobile');
Route::middleware('auth:api')->group(function(){
  Route::post('details', 'API\AuthController@getDetails');
  Route::post('test', 'testing@index');
  Route::post('get-question', 'QuestionsController@getone');
  Route::get('get-question', 'QuestionsController@getone');
  Route::post('send-answer', 'QAnswersController@answerQuestion');
  Route::get('send-answer', 'QAnswersController@answerQuestion');
  
});
//Auth::routes();
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
