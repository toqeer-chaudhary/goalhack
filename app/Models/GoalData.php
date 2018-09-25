<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class GoalData extends Model
{
    //    for soft deletes
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'actual_data','data_entry_date','comment',
    ];

    public function Goal()
    {
        return $this->belongsTo(Goal::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function showAllGoalDatas($id)
    {
        $goalDatas = GoalData::where('goal_id', $id)
            ->where("user_id","=",auth()->id())->where("actual_data","!=",0)->get();
        return $goalDatas;
    }
    public function storeData($storedata)
    {
//        return $storedata;
        $user=Auth::user()->id;
        $goalDataArray = [];

        foreach ($storedata->actual_data as $key => $data){
            $goalData = [
                'goal_id'=>$storedata->goal_id,
                'user_id' => $user,
                'actual_data' => $data,
                'data_entry_date' => $storedata->data_entry_date[$key],
                'comment' => $storedata->comment[$key]
            ];

            array_push ($goalDataArray, $goalData);
        }

        GoalData::insert($goalDataArray);
   }
    public function updateData($storedata,$id)
    {
        //return $storedata;
        //$goal = self::find($id);
        //dd($goal);

        foreach ($storedata->actual_data as $data)
        {
            $testArray = [
                'actual_data' => $data
            ];
            /*$m = $goal->update($testArray);
            return $m;*/
            GoalData::where('id', $id)->update($testArray);
        }
    }
   public function showGoalData($id)
   {
       //$goaldata[] = DB::table('goal_datas')->where('goal_id', $id)->lists('actual_data');
       $goaldata = GoalData::select('actual_data')->where('goal_id', $id)->get();
       return $goaldata;
   }
    public function showGoalDatas($id)
    {
        //$goaldata[] = DB::table('goal_datas')->where('goal_id', $id)->lists('actual_data');
        $goalDatas = GoalData::where('goal_id', $id)->get();
        return $goalDatas;
    }
    public function showGoalDataComment($id)
    {
        //$goaldata[] = DB::table('goal_datas')->where('goal_id', $id)->lists('actual_data');
        $goaldatacomment = GoalData::select('comment')->where('goal_id', $id)->get();
        return $goaldatacomment;
    }

    public function showGoalDataid($id)
    {
        //$goaldata[] = DB::table('goal_datas')->where('goal_id', $id)->lists('actual_data');
        $goaldataid = GoalData::select('id')->where('goal_id', $id)->get();
        return $goaldataid;
    }

    // this is the built in method please dont touch it
    // i use it to apply carbon functions on it
    // if i do not add start_Date adn end_date in it the carbon functions will not work
    // this function converts date into carbon format (not sure)
    public function getDates()
    {
        return ['created_at','updated_at','data_entry_date'];
    }

    // change the approve status
    public function changeApproveStatus($goalDataID)
    {
        $goalData = self::find($goalDataID);
        $goalData->is_approved = 1;
        $goalData->update();
    }

    // change the disapprove status
    public function changeDisApproveStatus($goalDataID)
    {
        $goalData = self::find($goalDataID);
        $goalData->is_approved = 2;
        $goalData->update();

    }

    public function fetchApproveRequestCount($goalId)
    {
        $approveCount = GoalData::all()->where('goal_id', $goalId)
            ->where("user_id",auth()->id())->where("is_approved",1)
            ->where("actual_data","!=",0)->count();
        return $approveCount;
    }

    public function fetchRejectedRequestCount($goalId)
    {
        $rejectCount = GoalData::all()->where('goal_id', $goalId)
            ->where("user_id",auth()->id())->where("is_approved",2)
            ->where("actual_data","!=",0)->count();
        return $rejectCount;
    }

    public function fetchPendingRequestCount($goalId)
    {
        $pendingCount = GoalData::all()->where('goal_id', $goalId)
            ->where("user_id",auth()->id())->where("is_approved",0)
            ->where("actual_data","!=",0)->count();
        return $pendingCount;
    }


    public function showAllGoalDataPerformanceByDate($date)
    {
        $goalDatas = GoalData::where('data_entry_date', $date)
            ->where("user_id","=",auth()->id())->where("actual_data","!=",0)->get();
        return $goalDatas;
    }

    public function fetchApproveRequestCountByDate($date)
    {
        $approveCount = GoalData::all()->where('data_entry_date', $date." 00:00:00")
            ->where("user_id",auth()->id())->where("is_approved",1)
            ->where("actual_data","!=",0)->count();
        return $approveCount;
    }

    public function fetchRejectedRequestCountByDate($date)
    {
        $rejectCount = GoalData::all()->where('data_entry_date', $date." 00:00:00")
            ->where("user_id",auth()->id())->where("is_approved",2)
            ->where("actual_data","!=",0)->count();
        return $rejectCount;
    }

    public function fetchPendingRequestCountByDate($date)
    {
        $pendingCount = GoalData::all()->where('data_entry_date', $date." 00:00:00")
            ->where("user_id",auth()->id())->where("is_approved",0)
            ->where("actual_data","!=",0)->count();
        return $pendingCount;
    }
}



