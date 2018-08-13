<?php

namespace App\Http\Controllers;

use App\Models\q_answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth; 
    use App\User; 
    use Illuminate\Support\Facades\DB;
use Exception;
use Validator;
 
class QAnswersController extends Controller
{
    public $successStatus = 200;
    public function __construct() {
        $this->middleware('auth');
    }
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
    public function answerQuestion(Request $request)
    {
        $rules = ['questions_id' => 'required|int|exists:questions,questions_id',];
        
        $messages =[ 'questions_id.required' => 'please enter rigth data ', ];
        $data = Validator::make($request->all(), $rules, $messages);
        
        if($data->fails()){
                $data = (array)$data->errors()->all();
                return response()->json(['message'=>$data,'code'=>403], $this->successStatus);
        }
        try {
            $user = Auth::user(); 
            $data = $request->all();
            $doesAnswerTRigth =q_answer::where('questions_id',$data['questions_id'])
                    ->where('answer',$data['answer'])->get();
            if(count($doesAnswerTRigth)>0){
                DB::beginTransaction();
                User::where('id',$user->id)->increment('score',1);
                DB::commit();
                $user = Auth::user(); 
                $score =  User::where('id',$user->id)->get();
                $score = $score[0]->score;
                return response()->json(['data'=>1,'sucess'=>true,'score'=> $score,'message'=>'Rigth answer Bravo','code'=>200], $this->successStatus);
            } else {
                $score =  $user->score;
                $answer =q_answer::where('questions_id',$data['questions_id'])
//                    ->where('answer',$data['answer'])
                        ->get();
                return response()->json(['data'=>0,'sucess'=>FALSE ,'score'=> $score,'right-answer'=>$answer[0]->answer,
                    'message'=>'wrong answer Bravo','code'=>401], $this->successStatus);
            }

        } catch (Exception $exception) {
            DB::rollBack(); 
            return response()->json(['message' => $exception->getMessage(),'code'=>500 ], 200);
            
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
