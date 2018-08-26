<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\question_to_user;
use App\Models\q_answer;
use Exception;

class questions extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'questions_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'question',
                  'choice_1',
                  'choice_2',
                  'choice_3',
                  'type'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    public function getNewQuestion($user_id) {
        $questionTakenRow = question_to_user::select('questions_id')
                ->where('user_id',$user_id)->get();
        $questionTaken = [];
        $question = '';
        if(count($questionTakenRow)==0){
            
        } else {
            foreach ($questionTakenRow as $key => $value) {
                $questionTaken[] = $value['questions_id'];
            }
        }
        $question_row = self::whereNotIn('questions_id',$questionTaken)->get();
        if(count($question_row)>0){
            $question = $question_row[0];
            question_to_user::insert(array('questions_id' => $question->questions_id, 
                'user_id'=>$user_id));
        }
        return $question;
    }
    
    public function questionAnswer() {
        return $this->hasOne('App\Models\q_answer', 'questions_id');
        
    }


}
