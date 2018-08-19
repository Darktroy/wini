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
        $questionsObjects = questions::paginate(25);
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
     /*array:7 [▼
  "_token" => "Ty1iEJOCxVt6iDug1iBlI1AdDOgsdSCEa1g0OFAb"
  "question" => "test 1"
  "type" => "multi"
  "choice_1" => "c1"
  "choice_2" => "c2"
  "choice_3" => "c3"
  "rigthanswer" => "c3"
]*/   
        try {
            $user = Auth::user();
            $data = $this->getData($request);
            $question = questions::create($data);
            $data = $request->all();
            q_answer::create(array('questions_id'=>$question->questions_id,
                'answer'=>$data['answer']));
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
        try {
            $user = Auth::user();
            $data = $this->getData($request);
            
            $data = $request->all();
            if ($request->hasFile('questionImage') 
//                    && is_file($data['questionImage'])
                    ){ 
//            dd($data);
                $file = $request->file('questionImage');
                $ext = strtolower($file->getClientOriginalExtension());
                    $imageName = 'nasr_'. md5($user->id).'.'.$ext;
                    $data['questionImage']->move(public_path('/nasr'), $imageName);
//                $data['logo'] =helperVars::$logoPath.$imageName;
                $imageName = '/nasr/'.$imageName;
                $data['question'] =url($imageName);
//                dd($data);
//                dd(url($imageName));
            } 
            $question = questions::create($data);
            q_answer::create(array('questions_id'=>$question->questions_id,
                'answer'=>$data['answer']));
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
