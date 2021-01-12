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
    /**
     * 使用した下剤の総量とブリストルスケールの平均を週間単位で取得する
     *
     * @param int profile_id：対象患者
     * @param date start_date：対象期間開始日
     * @param date end_date：対象期間終了日
     * @return array|bool
     */
    public static function getAggregateResults($profile_id, $start_date, $end_date){
        $ret = null;
        
        try
        {
            $query = 'SELECT AVG(bs) AS bs, SUM(amount) AS amount, date(date + interval 1 - DAYOFWEEK(date) day) AS beginning '.
                     'FROM diaries '.
                     "WHERE profile_id = $profile_id ".
                     "AND date BETWEEN '$start_date' AND '$end_date' ".
                     'GROUP BY beginning ';
            
            $ret = \DB::select(\DB::raw($query));
        }
        catch(\Exception $e)
        {
            echo $e;
            $ret = array();
        }
        
        return $ret;
    }
}


