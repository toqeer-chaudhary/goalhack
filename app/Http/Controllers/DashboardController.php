<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Models\GoalData;
use App\Models\Goal;
use App\Models\Strategy;
use App\Models\Vision;
use App\Models\Kpi;
use Auth;
use DB;
use DateTime;


class DashboardController extends Controller
{
    private $goal;
    private $goaldata;
    private $kpi;
    public function __construct(Goal $goal, GoalData $goalData, Kpi $kpi)
    {
        $this->goal = $goal;
        $this->goaldata = $goalData;
        $this->kpi = $kpi;
    }

    public function getLaraChart()
    {
        $lava = new \Khill\Lavacharts\Lavacharts;

        $stocksTable = $lava->DataTable();  // Lava::DataTable() if using Laravel

        $stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Projected')
            ->addNumberColumn('Official');

// Random Data For Example
        for ($a = 1; $a < 30; $a++) {
            $stocksTable->addRow([
                '2015-10-' . $a, rand(800,1000), rand(800,1000)
            ]);
        }


        return view('dashboard.goal-dashboard',compact('lava'));
    }

    public function visionDashboard()
    {
        $visions = array();
        $user = Auth::user();
        $vis = Vision::all()->where("company_id","",$user->company_id);
        //$vis = Vision::all()->where("company_id","",auth()->id());
        foreach ($vis as $v)
        {
            array_push($visions, $v);
        }
        return view("dashboard.vision", compact('visions'));
    }
    public function showVisionToDash(Request $request)
    {
        $goalDataSum = 0;
        $goalTarget = 0;
        $goalsTarget = 0;
        $strategyPercentage = array();
        $goalDataTotalTarget = 0;
        $goalPercentage = array();
        $goalPer = 0;
        $goal_Percentage = 0;
        $goalsum = 0;
        $kpisum = 0;
        $kpiPer = 0;
        $kpisTarget = 0;
        $vision = array();
        $strategyArray = array();
        $strategyTargets = array();
        $strategyActuals = array();
        $kpiPercentage = array();
        $goalsArray =  array();
        $kpisArray = array();

        $vision_id = $request->vision_id;
        $vis = Vision::find($vision_id);
        $strategies = Strategy::all()->where("vision_id","=",$vision_id);

        foreach ($strategies as $strategy)
        {
            array_push($strategyArray, $strategy);
            $kpis = Kpi::all()->where("strategy_id","=",$strategy->id);
            $goalsTarget = $goalDataSum = 0;
            foreach ($kpis as $kpi)
            {
                array_push($kpisArray, $kpi);
                $goals = Goal::all()->where("kpi_id","",$kpi->id);

                foreach ($goals as $goal)
                {
                    $goaldata = $this->goaldata->showGoalData($goal->id);
                    $goalTarget = $goal->target * count($goaldata);
                    if(count($goaldata) == 0)
                    {
                        $goalTarget = ($goal->target * 1);
                    }
                    else
                    {
                        $goalTarget = ($goal->target * count($goaldata));
                    }
                    foreach ($goaldata as $goaldatum)
                    {
                        $goalDataSum += $goaldatum->actual_data;
                    }
                    //Find Goal Percentage
                    if($goalTarget != 0)
                    {
                        $goalPer = ($goalDataSum *100 ) / $goalTarget ;
                    }
                    else{
                        $goalPer = 0;
                    }

                    array_push($goalPercentage, $goalPer);
                    $goalsTarget += $goalTarget;
                }
                //return $goalDataSum;
                for ($i =0; $i<count($goalPercentage); $i++)
                {
                    $goalsum += $goalPercentage[$i];
                }
                if($goalTarget != 0)
                {
                    $kpiPer = ($goalsum/$goalTarget) * 100;
                    array_push($kpiPercentage, $kpiPer);
                }
                else
                {
                    $kpiPer = 0;
                    array_push($kpiPercentage, $kpiPer);
                }
                $kpisTarget += $goalTarget;
            }
            array_push($strategyTargets, $goalsTarget);
            array_push($strategyActuals, $goalDataSum);
            for ($i =0; $i<count($kpiPercentage); $i++)
            {
                $kpisum += $kpiPercentage[$i];
            }
            if($kpisum != 0)
            {
                $strategyPer = ($kpisum/$kpisTarget) * 100;
                array_push($strategyPercentage, $strategyPer);
            }
            else
            {
                $strategyPer = 0;
                array_push($strategyPercentage, $strategyPer);
            }

        }

        array_push($vision, $strategyPercentage);
        array_push($vision, $strategyArray);
        array_push($vision, $kpiPercentage);
        array_push($vision, $kpisArray);
        array_push($vision, $goalPercentage);
        array_push($vision, $goalsArray);
        array_push($vision, $vis);
        array_push($vision, $strategyTargets);
        array_push($vision, $strategyActuals);
        //dd($vision);
        return $vision;
    }

    public function strategyDashboard()
    {
        $strategies = array();
        $user = Auth::user();
        $stra = Strategy::all()->where("user_id","",auth()->id());
        foreach ($stra as $strategy)
        {
            array_push($strategies, $strategy);
        }
        return view("dashboard.strategy", compact('strategies'));
    }

    public function showStrategyToDash(Request $request)
    {
        $goalDataSum = 0;
        $goalTarget = 0;
        $goalsTarget = 0;
        $goalDataTotalTarget = 0;
        $goalPercentage = array();
        $goalPer = 0;
        $strategyTarget = 0;
        $strategyObt = 0;
        $strategyPerRemaining = 0;
        $kpiPercentage = array();
        $goalsArray =  array();
        $kpisArray = array();
        $kpiTargets = array();
        $kpiActuals = array();
        $strategy = array();
        $strategy_id = $request->strategy_id;
        $str = Strategy::find($strategy_id);
        $kpis = Kpi::all()->where("strategy_id","=",$strategy_id);

        foreach ($kpis as $kpi)
        {
            array_push($kpisArray, $kpi);
            $goals = Goal::all()->where("kpi_id","=",$kpi->id);
           // return $kpis;
            $goalsTarget = $goalDataSum = 0;
            foreach ($goals as $goal)
                {

                    array_push($goalsArray, $goal);
                    //$goal = Goal::all()->where("goal_id","=",$goal->id);
                    $goaldata = $this->goaldata->showGoalData($goal->id);
                    if(count($goaldata) == 0)
                    {
                        $goalTarget = ($goal->target * 1);
                    }
                    else
                    {
                        $goalTarget = ($goal->target * count($goaldata));
                    }

                    foreach ($goaldata as $goaldatum)
                    {
                        $goalDataSum += $goaldatum->actual_data;
                    }
                    //Find Goal Percentage
                    if($goalTarget != 0)
                    {
                        $goalPer = ($goalDataSum *100 ) / $goalTarget ;
                    }
                    else{
                        $goalPer = 0;
                    }
                    array_push($goalPercentage, $goalPer);
                    $goalsTarget += $goalTarget;
                    $strategyTarget += $goalsTarget;
                    $strategyObt += $goalDataSum;
                }
            array_push($kpiTargets, $goalsTarget);
            array_push($kpiActuals, $goalDataSum);

            if($goalsTarget != 0)
            {
                $kpiPer = ($goalDataSum/$goalsTarget) * 100;
                array_push($kpiPercentage, $kpiPer);
            }
            else
            {
                $kpiPer = 0;
                array_push($kpiPercentage, $kpiPer);
            }
        }
        //return $strategyTarget;
        if($strategyTarget != 0)
        {
            $strategyPerRemaining = 100 - (($strategyObt * 100) / $strategyTarget);
        }
        else{
            $strategyPerRemaining = 0;
        }
        //dd($strategyTarget);
        array_push($strategy, $kpiPercentage);
        array_push($strategy, $kpisArray);
        array_push($strategy, $goalPercentage);
        array_push($strategy, $goalsArray);
        array_push($strategy, $strategyPerRemaining);
        array_push($strategy, $str);
        array_push($strategy, $kpiTargets);
        array_push($strategy, $kpiActuals);

        //dd($strategy);
        return $strategy;
    }

    public function kpiDashboard(Request $request)
    {
        $kpis = array();
        $user = Auth::user();
        $kp = Kpi::all()->where("user_id","",auth()->id());
        foreach ($kp as $kpi)
        {
            array_push($kpis, $kpi);
        }
        return view("dashboard.kpi", compact('kpis'));
    }

    public function showKpiToDash(Request $request)
    {
        $goalDataTotalTarget    = 0;
        $goalTargetSums         = array();
        $goalDataSumArray       = array();
        $goalsArray             = array();
        $kpi                    = array();
        $kpi_id                 = $request->kpi_id;
        $kp                     = KPI::find($kpi_id);
        $goals = Goal::all()->where("kpi_id","=",$kpi_id);

            foreach ($goals as $goal)
            {
                $goalDataSum = 0;
                $goalTargets = $goal->target;
                array_push($goalsArray, $goal);
                $goaldata = $this->goaldata->showGoalData($goal->id);
//             return $goaldata;
                if($goal->target * count($goaldata) != 0)
                {
                    $goalTarget = $goal->target * count($goaldata);
                    foreach ($goaldata as $goaldatum)
                    {
                        $goalDataSum += $goaldatum->actual_data;
                    }
                    $goalTargets =  $goalTarget ;
                }
//
                array_push($goalTargetSums, $goalTargets);
                array_push($goalDataSumArray, $goalDataSum);
            }

        array_push($kpi, $goalsArray);
        array_push($kpi, $goalTargetSums);
        array_push($kpi, $goalDataSumArray);
        array_push($kpi, $kp);

        return $kpi;
    }

    public function showgoals(Request $request)
    {
        $id = $request->d_goal_id;
        $goals = Goal::where('kpi_id', $id)->get();
        return $goals;
    }
    
    public function goalDashboard()
    {
//        $goals = auth()->user()->goal;
         $goals = Goal::all()->where("user_id","=",Auth()->id());
        return view("dashboard.goal", compact('goals'));
    }
    public function showGoalToDash(Request $request)
    {
        $id = $request->goal_id;
        $goal = $this->goal->showDetails($id);
        $goalAndGoalDatas = array();
        $goalDatas = $this->goaldata->showGoalDatas($id);
        array_push($goalAndGoalDatas, $goal);
        array_push($goalAndGoalDatas, $goalDatas);
        return $goalAndGoalDatas;
    }









































    public function goalDataDashboard()
    {
        $goals = auth()->user()->goal;
        return view("dashboard.goalData",compact("goals"));
    }

    public function showGoalDataToDash(Request $request)
    {
        $id = $request->goal_id;
        $goal = $this->goal->showDetails($id);
        $goalAndGoalDatas = array();
        $goalDatas = $this->goaldata->showAllGoalDatas($id);
        array_push($goalAndGoalDatas, $goal);
        array_push($goalAndGoalDatas, $goalDatas);
        array_push($goalAndGoalDatas, $this->goaldata->fetchApproveRequestCount($id));
        array_push($goalAndGoalDatas, $this->goaldata->fetchRejectedRequestCount($id));
        array_push($goalAndGoalDatas, $this->goaldata->fetchPendingRequestCount($id));
        return $goalAndGoalDatas;
    }

    public function showGoalDataPerfromanceByDate(Request $request)
    {
        $date = $request->date;
        $goalAndGoalDatas = array();
        $goalDatas = $this->goaldata->showAllGoalDataPerformanceByDate($date);
        array_push($goalAndGoalDatas, $goalDatas);
        array_push($goalAndGoalDatas, $this->goaldata->fetchApproveRequestCountByDate($date));
        array_push($goalAndGoalDatas, $this->goaldata->fetchRejectedRequestCountByDate($date));
        array_push($goalAndGoalDatas, $this->goaldata->fetchPendingRequestCountByDate($date));
        return $goalAndGoalDatas;
    }
}
