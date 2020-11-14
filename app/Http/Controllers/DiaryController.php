<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Diary;
use App\Profile;
use Carbon\Carbon;

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
        $date = date("Y-m-d H:i:s");
        if($request->month == "" ){
            
            $year = date('Y', strtotime($date));
            $month = date('n', strtotime($date));
            // dd($year);
            $lastday = date( 't' , strtotime($date));
            $diaries = Diary::where('profile_id',$id)->whereYear('date',$year)->whereMonth('date',$month)->get();
        }else{
            $year = $request->year;
            $month = $request->month;
            $lastday = date('t',strtotime("$year-$month-01"));
            $diaries = Diary::where('profile_id',$id)->whereYear('date',$year)->whereMonth('date',$month)->get();
        }
        // dd($diaries);
        $nextYear =  Carbon::create($year, $month)->addMonthsNoOverflow()->year;
        $nextMonth = Carbon::create($year, $month)->addMonthsNoOverflow()->month;
        
        $prevYear = Carbon::create($year, $month)->subMonthNoOverflow()->year;
        $prevMonth = Carbon::create($year, $month)->subMonthNoOverflow()->month;
        
        return view('diary.index',[
            'id' => $id,
            'diaries' => $diaries,
            'lastday'=>$lastday,
            'month'=>$month,
            'nextYear' => $nextYear,
            'nextMonth' => $nextMonth,
            'prevYear' => $prevYear,
            'prevMonth' => $prevMonth,]);
    }
    //
}
