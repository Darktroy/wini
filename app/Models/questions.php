<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    



}
