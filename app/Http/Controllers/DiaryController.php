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
    
    public function average(){
	    $sum = 0;
	    foreach($list as $a){
		$sum += $a;
	    }
	    return($sum/count());
        }
    
    public function graph(Request $request)
    {
        $date = date("Y-m-d H:i:s");
        $weekNo = date('w', strtotime($date));//今日の曜日の値を代入０＝日曜
        $startDate = date('Y/m/d', strtotime("-{$weekNo} day", strtotime($date)));//週の初め(日曜日)を表示
        $prevWeek = date('Y/m/d', strtotime("-7 day", strtotime($startDate)));
        $prev2Week = date('Y/m/d', strtotime("-14 day", strtotime($startDate)));
        $prev3Week = date('Y/m/d', strtotime("-21 day", strtotime($startDate)));
        $prev4Week = date('Y/m/d', strtotime("-28 day", strtotime($startDate)));
        $prev5Week = date('Y/m/d', strtotime("-35 day", strtotime($startDate)));
        $prev6Week = date('Y/m/d', strtotime("-42 day", strtotime($startDate)));
        $prev7Week = date('Y/m/d', strtotime("-49 day", strtotime($startDate)));
        $prev8Week = date('Y/m/d', strtotime("-56 day", strtotime($startDate)));
        
        $amount1 = Diary::where('profile_id',$id)->whereBetween('date',[$startDate,$date])->select('amount')->get();
        $total1 = array_sum($amount1);
        $amount2 = Diary::where('profile_id',$id)->whereBetween('date',[$prevWeek,date('Y/m/d', strtotime("-1 day", strtotime($startDate)))])->select('amount')->get();
        $total2 = array_sum($amount2);
        $amount3 = Diary::where('profile_id',$id)->whereBetween('date',[$prev2Week,date('Y/m/d', strtotime("-1 day", strtotime($prevWeek)))])->select('amount')->get();
        $total3 = array_sum($amount3);
        $amount4 = Diary::where('profile_id',$id)->whereBetween('date',[$prev3Week,date('Y/m/d', strtotime("-1 day", strtotime($prev2Week)))])->select('amount')->get();
        $total4 = array_sum($amount4);
        $amount5 = Diary::where('profile_id',$id)->whereBetween('date',[$prev4Week,date('Y/m/d', strtotime("-1 day", strtotime($prev3Week)))])->select('amount')->get();
        $total5 = array_sum($amount5);
        $amount6 = Diary::where('profile_id',$id)->whereBetween('date',[$prev5Weeke,date('Y/m/d', strtotime("-1 day", strtotime($prev4Week)))])->select('amount')->get();
        $total6 = array_sum($amount6);
        $amount7 = Diary::where('profile_id',$id)->whereBetween('date',[$prev6Week,date('Y/m/d', strtotime("-1 day", strtotime($prev5Week)))])->select('amount')->get();
        $total7 = array_sum($amount7);
        $amount8 = Diary::where('profile_id',$id)->whereBetween('date',[$prev7Week,date('Y/m/d', strtotime("-1 day", strtotime($prev6Week)))])->select('amount')->get();
        $total8 = array_sum($amount8);
        $amount9 = Diary::where('profile_id',$id)->whereBetween('date',[$prev8Week,date('Y/m/d', strtotime("-1 day", strtotime($prev7Week)))])->select('amount')->get();
        $total9 = array_sum($amount9);
        
        //$this->average()で呼び出して使う？
        
        $bs1 = Diary::where('profile_id',$id)->whereBetween('date',[$startDate,$date])->select('bs')->get();
        $averagebs1 = average($bs1); 
        $bs2 = Diary::where('profile_id',$id)->whereBetween('date',[$prevWeek,date('Y/m/d', strtotime("-1 day", strtotime($startDate)))])->select('bs')->get();
        $averagebs2 = average($bs2);
        $bs3 = Diary::where('profile_id',$id)->whereBetween('date',[$prev2Week,date('Y/m/d', strtotime("-1 day", strtotime($prevWeek)))])->select('bs')->get();
        $averagebs3 = average($bs3);
        $bs4 = Diary::where('profile_id',$id)->whereBetween('date',[$prev3Week,date('Y/m/d', strtotime("-1 day", strtotime($prev2Week)))])->select('bs')->get();
        $averagebs4 = average($bs4);
        $bs5 = Diary::where('profile_id',$id)->whereBetween('date',[$prev4Week,date('Y/m/d', strtotime("-1 day", strtotime($prev3Week)))])->select('bs')->get();
        $averagebs5 = average($bs5);
        $bs6 = Diary::where('profile_id',$id)->whereBetween('date',[$prev5Weeke,date('Y/m/d', strtotime("-1 day", strtotime($prev4Week)))])->select('bs')->get();
        $averagebs6 = average($bs6);
        $bs7 = Diary::where('profile_id',$id)->whereBetween('date',[$prev6Week,date('Y/m/d', strtotime("-1 day", strtotime($prev5Week)))])->select('bs')->get();
        $averagebs7 = average($bs7);
        $bs8 = Diary::where('profile_id',$id)->whereBetween('date',[$prev7Week,date('Y/m/d', strtotime("-1 day", strtotime($prev6Week)))])->select('bs')->get();
        $averagebs8 = average($bs8);
        $bs9 = Diary::where('profile_id',$id)->whereBetween('date',[$prev8Week,date('Y/m/d', strtotime("-1 day", strtotime($prev7Week)))])->select('bs')->get();
        $averagebs9 = average($bs9);
        
    return view('profile.graph',[
        'startDate'=>$startDate,
        'prevWeek'=>$prevWeek,
        'prev2Week'=>$prev2Week,
        'prev3Week'=>$prev3Week,
        'prev4Week'=>$prev4Week,
        'prev5Week'=>$prev5Week,
        'prev6Week'=>$prev6Week,
        'prev7Week'=>$prev7Week,
        'prev8Week'=>$prev8Week,
        'total1'=>$total1,
        'total2'=>$total2,
        'total3'=>$total3,
        'total4'=>$total4,
        'total5'=>$total5,
        'total6'=>$total6,
        'total7'=>$total7,
        'total8'=>$total8,
        'total9'=>$total9,
        ]);
    }
    //
}
