<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'profile_id'=>'required',
        'date'=> 'required',
        'time',
        'bs',
        'size',
        'smell',
        'color',
        'medicine',
        'amount',
        'water'=> 'required',
        'note',
    );
}
