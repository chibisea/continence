<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Diary;
use App\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            
            $year = date('Y', strtotime($date));
            $month = date('n', strtotime($date));
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
     public function graph2(Request $request)
    {
        $startDay = date("Y-m-d",strtotime("-4 week"));
        $sWeekNo = date('w', strtotime($startDay));
        
        $endDay = date("Y-m-d");
        $eWeekNo = 6 - date('w', strtotime($endDay));
        
        // データ取得開始日(5週前の週頭)
        $startDate = date('Y/m/d', strtotime("-{$sWeekNo} day", strtotime($startDay)));
        // データ取得終了日(今週末)
        $endDate = date('Y/m/d', strtotime("+{$eWeekNo} day", strtotime($endDay)));
        $id = $request->profile_id;
        
        // ブリストルスケールの平均値を取得
        $aggregateResults = Diary::getAggregateResults($id, $startDate, $endDate);
        
        return view('profile.graph2',compact('aggregateResults'));
    }
}
