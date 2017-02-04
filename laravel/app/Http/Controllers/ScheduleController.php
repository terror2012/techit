<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\queries;
use App\Eloquent\query_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ScheduleController extends Controller
{
    public function index()
    {
        $gen = general_settings::find('1');
        $genData['schedule_img'] = $gen->schedule_img;
        $genData['schedule_capt'] = $gen->schedule_capt;
        $query = queries::all();
        $queryD = query_data::all();
        $date = "";
        $days = "";
        $dayLoop = [];
        for ($i = 0 ; $i < 14; $i++)
        {
            $date = date('d, F , Y', strtotime("+" . $i . " days"));
            array_push($dayLoop,$date);
        }
        if(!$queryD->isEmpty())
        {


            $queryLoop = [];

            foreach($queryD as $q)
            {
                $queryLoop[] = $q->date;
            }
            $existsDayLoop = [];
            for($i = 0; $i < 14; $i++)
            {
                if(in_array($dayLoop[$i], $queryLoop))
                {
                    $existsDayLoop[] = $dayLoop[$i];
                }
            }
            $existsTime = [];
            for ($i = 0; $i < count($existsDayLoop); $i++)
            {
                $qur = query_data::where('date', '=', $existsDayLoop[$i])->get();
                if ($qur != null)
                {
                    foreach($qur as $q){
                        $existsTime[$existsDayLoop[$i]][] = $q->time;
                    }
                }
            }
            $DateExists = [];
            $keys=  array_keys($existsTime);
            for ($i = 0; $i < count($existsTime); $i++)
            {
                if(count($existsTime[$keys[$i]]) > 2)
                {
                    $DateExists = key($existsTime[$i]);
                }
            }

            /*$redis = Redis::connection();
            $redis->publish('business', '01:00PM');*/
            return view('schedule')->with('days', $dayLoop)->with('dayExist', $DateExists)->with('timeExist', $existsTime)->with('gen', $genData);
        }
        return view('schedule')->with('days', $dayLoop)->with('timeExist', null)->with('gen', $genData);

    }
    public function query()
    {

    }
}
