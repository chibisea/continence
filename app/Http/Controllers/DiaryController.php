<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Diary;
use App\Profile;

class DiaryController extends Controller
{
    public function add(Request $request)
    {
    return view('diary.create',["profile_id"=>$request->profile_id]);
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
    
    public function index(Request $request)
    {
        $id = $request->profile_id;
        $diaries = Diary::where('profile_id',$id)->get()->sortBy('date');
        return view('diary.index',['diaries' => $diaries]);
    }
    //
}
