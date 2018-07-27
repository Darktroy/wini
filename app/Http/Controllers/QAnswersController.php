<?php

namespace App\Http\Controllers;

use App\Models\q_answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class QAnswersController extends Controller
{

    /**
     * Display a listing of the q answers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $qAnswers = q_answer::with('question')->paginate(25);

        return view('q_answers.index', compact('qAnswers'));
    }

    /**
     * Show the form for creating a new q answer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $questions = Question::pluck('question','id')->all();
        
        return view('q_answers.create', compact('questions'));
    }

    /**
     * Store a new q answer in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            q_answer::create($data);

            return redirect()->route('q_answers.q_answer.index')
                             ->with('success_message', 'Q Answer was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified q answer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $qAnswer = q_answer::with('question')->findOrFail($id);

        return view('q_answers.show', compact('qAnswer'));
    }

    /**
     * Show the form for editing the specified q answer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $qAnswer = q_answer::findOrFail($id);
        $questions = Question::pluck('question','id')->all();

        return view('q_answers.edit', compact('qAnswer','questions'));
    }

    /**
     * Update the specified q answer in the storage.
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
            
            $qAnswer = q_answer::findOrFail($id);
            $qAnswer->update($data);

            return redirect()->route('q_answers.q_answer.index')
                             ->with('success_message', 'Q Answer was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified q answer from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $qAnswer = q_answer::findOrFail($id);
            $qAnswer->delete();

            return redirect()->route('q_answers.q_answer.index')
                             ->with('success_message', 'Q Answer was successfully deleted!');

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
            'answer' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
