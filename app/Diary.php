<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'profile_id'=>'required',
        'date'=> 'required',
        'time'=> 'required',
        'bs'=> 'required',
        'size'=> 'required',
        'smell'=> 'required',
        'color'=> 'required',
        'medicine'=> 'required',
        'amount'=> 'required',
        'water'=> 'required',
        'note'=> 'required',
    );
}
