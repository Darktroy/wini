<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class QuestionsController extends Controller
{

    /**
     * Display a listing of the questions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $questionsObjects = questions::paginate(25);

        return view('questions.index', compact('questionsObjects'));
    }

    /**
     * Show the form for creating a new questions.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('questions.create');
    }

    /**
     * Store a new questions in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            questions::create($data);

            return redirect()->route('questions.questions.index')
                             ->with('success_message', 'Questions was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified questions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $questions = questions::findOrFail($id);

        return view('questions.show', compact('questions'));
    }

    /**
     * Show the form for editing the specified questions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $questions = questions::findOrFail($id);
        

        return view('questions.edit', compact('questions'));
    }

    /**
     * Update the specified questions in the storage.
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
            
            $questions = questions::findOrFail($id);
            $questions->update($data);

            return redirect()->route('questions.questions.index')
                             ->with('success_message', 'Questions was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified questions from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $questions = questions::findOrFail($id);
            $questions->delete();

            return redirect()->route('questions.questions.index')
                             ->with('success_message', 'Questions was successfully deleted!');

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
            'id' => 'nullable',
            'question' => 'string|min:1|nullable',
            'choice_1' => 'string|min:1|nullable',
            'choice_2' => 'string|min:1|nullable',
            'choice_3' => 'string|min:1|nullable',
            'type' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
