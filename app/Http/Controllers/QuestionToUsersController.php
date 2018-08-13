<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\question_to_user;
use App\Http\Controllers\Controller;
use Exception;

class QuestionToUsersController extends Controller
{

    /**
     * Display a listing of the question to users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $questionToUsers = question_to_user::with('question','user')->paginate(25);

        return view('question_to_users.index', compact('questionToUsers'));
    }

    /**
     * Show the form for creating a new question to user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $questions = Question::pluck('question','id')->all();
$users = User::pluck('id','id')->all();
        
        return view('question_to_users.create', compact('questions','users'));
    }

    /**
     * Store a new question to user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            question_to_user::create($data);

            return redirect()->route('question_to_users.question_to_user.index')
                             ->with('success_message', 'Question To User was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified question to user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $questionToUser = question_to_user::with('question','user')->findOrFail($id);

        return view('question_to_users.show', compact('questionToUser'));
    }

    /**
     * Show the form for editing the specified question to user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $questionToUser = question_to_user::findOrFail($id);
        $questions = Question::pluck('question','id')->all();
$users = User::pluck('id','id')->all();

        return view('question_to_users.edit', compact('questionToUser','questions','users'));
    }

    /**
     * Update the specified question to user in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $questionToUser = question_to_user::findOrFail($id);
            $questionToUser->update($data);

            return redirect()->route('question_to_users.question_to_user.index')
                             ->with('success_message', 'Question To User was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified question to user from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $questionToUser = question_to_user::findOrFail($id);
            $questionToUser->delete();

            return redirect()->route('question_to_users.question_to_user.index')
                             ->with('success_message', 'Question To User was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'questions_id' => 'nullable',
            'user_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
