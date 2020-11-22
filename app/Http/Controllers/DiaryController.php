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
        return redirect('profile/index');
    }
    
    public function index(Request $request)
    {
        
        $id = $request->profile_id;
        $date = date("Y-m-d H:i:s");
        if($request->month == "" ){
            
            $year = string('Y', strtotime($date));
            $month = string('n', strtotime($date));
            // dd($year);
            $diaries = Diary::where('profile_id',$id)->whereYear('date',$year)->whereMonth('date',$month)->get()->sortBy('date');
        }else{
            $year = $request->year;
            $month = $request->month;
            $diaries = Diary::where('profile_id',$id)->whereYear('date',$year)->whereMonth('date',$month)->get()->sortBy('date');
        }
        // dd($diaries);
        $nextYear =  Carbon::create($year, $month)->addMonthsNoOverflow()->year;
        $nextMonth = Carbon::create($year, $month)->addMonthsNoOverflow()->month;
        
        $prevYear = Carbon::create($year, $month)->subMonthNoOverflow()->year;
        $prevMonth = Carbon::create($year, $month)->subMonthNoOverflow()->month;
        
        return view('diary.index',[
            'id' => $id,
            'diaries' => $diaries,
            'month'=>$month,
            'nextYear' => $nextYear,
            'nextMonth' => $nextMonth,
            'prevYear' => $prevYear,
            'prevMonth' => $prevMonth,]);
    }
    //
}
