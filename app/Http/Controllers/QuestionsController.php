<?php

namespace App\Http\Controllers;

use App\Models\questions;
use \App\Models\q_answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth; 
    use App\User; 
    use Illuminate\Support\Facades\DB;
use Exception;

class QuestionsController extends Controller
{
    public $successStatus = 200;
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the questions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $questionsObjects_row = questions::with('questionAnswer')->get();
        $questionsObjects = array();
        $i = 0;
//        dd($questionsObjects_row);
        foreach ($questionsObjects_row as $key => $value) {
            
            if(!empty($value['questionAnswer']->answer)){
                $i++;
                $questionsObjects[] = array('questions_id'=>$i,'question'=> $value['question']
                    ,'choice_1'=> $value['choice_1'],'choice_2'=> $value['choice_2']
                    ,'choice_3'=> $value['choice_3'],'answer'=>$value['questionAnswer']->answer,
                'type'=> $value['type'] );

            }
        }
//        dd($questionsObjects);
        return view('questions.index', compact('questionsObjects'));
    }

    public function getOne() {
        try {
            DB::beginTransaction();
            $user = Auth::user(); 
            
            $quetion_obj = new questions();
            $quetion = $quetion_obj->getNewQuestion($user->id);
            DB::commit();
            return response()->json(['data'=>$quetion,'score'=>$user->score,'code'=>200], $this->successStatus);
        } catch (Exception $exc) {
            DB::rollBack(); 
            return response()->json(['message' => $exception->getMessage(),'code'=>500 ], 200);
        }

        
//dd($questionTaken[]);
        
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
    public function createImage()
    {
        return view('questions.createIMAGE');
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
            $user = Auth::user();
            $data = $this->getData($request);
            
            $question = questions::create($data);
            $data = $request->all();
            $theanswer = $data['choice_3'];
            if($data['answer']=="2"){
                $theanswer = $data['choice_2'];
            }
            if($data['answer']=="1"){
                $theanswer = $data['choice_1'];
            }
            q_answer::create(array('questions_id'=>$question->questions_id,
                'answer'=>$theanswer));
//            'questions_id',1
//                  'answer'
            return redirect()->route('questions.questions.index')
                             ->with('success_message', 'Questions was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function storeImage(Request $request)
    {
//        dd(__LINE__);
        $st1 = str_replace(':', '', now());
        $st2 = str_replace('-', '', $st1);
        $st3 = str_replace(' ', '', $st2);
        try {
            $user = Auth::user();
            $data = $this->getDataImage($request);
            
            $data = $request->all();
            $theanswer = $data['choice_3'];
            if($data['answer']=="2"){
                $theanswer = $data['choice_2'];
            }
            if($data['answer']=="1"){
                $theanswer = $data['choice_1'];
            }
            if ($request->hasFile('questionImage') 
                    && is_file($data['questionImage'])
                    ){ 
                $file = $request->file('questionImage');
                $ext = strtolower($file->getClientOriginalExtension());
                    $imageName = 'nasr_'. md5($st3). md5($user->id).'.'.$ext;
                    $data['questionImage']->move(public_path('/nasr'), $imageName);
                $imageName = '/nasr/'.$imageName;
                $data['question'] =url($imageName);
            } 
            $question = questions::create($data);
            q_answer::create(array('questions_id'=>$question->questions_id,
                'answer'=>$theanswer));
//            'questions_id',1
//                  'answer'
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
            'question' => 'required|string|min:1|unique:questions,question',
            'choice_1' => 'required|string|min:1',
            'choice_2' => 'required|string|min:1',
            'choice_3' => 'string|nullable',
            'type' => 'required|string|min:1',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    protected function getDataImage(Request $request)
    {
        $rules = [
            'questionImage' => 'required|image|min:1',
            'choice_1' => 'required|string|min:1',
            'choice_2' => 'required|string|min:1',
            'choice_3' => 'string|nullable',
            'type' => 'required|string|min:1',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }
}
