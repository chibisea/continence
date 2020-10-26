<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Diary;

class DiaryController extends Controller
{
    public function add()
    {
    return view('diary.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Diary::$rules);
        $diary = new Diary;
        $form = $request -> all();
        unset($form['__token']);
        
        $diary->fill($form);
        $diary->save();
        return redirect('diary/create');
    }
    
    public function read()
    {
    return view('diary.index');
    }
    //
}
