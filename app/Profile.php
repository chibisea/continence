<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name'=> 'required',
        'gender'=> 'required',
        'age'=> 'required',
        'ward'=> 'required',
        'disease'=> 'required',
    );
}
