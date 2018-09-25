<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Kpi;
use Illuminate\Support\Facades\Auth;
use Midnite81\GeoLocation\Contracts\Services\GeoLocation;
class GoalController extends Controller
{
    private $goal;
    private  $user;
    public function __construct(Goal $goal, User $userObject)
    {
        $this->goal = $goal;
        $this->user = $userObject;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $userid =
        // fetching all visions that are assigned to this user
        $kpi  = $user->kpis;
        $goal = Goal::all();
        return view('goal.index',compact('kpi','goal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$goal=Goal::create($request->all());
        return $goal;*/
        return response()->json($this->goal->storeGoal($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goalData = $this->goal->showDetails($id);
        return view("goal.show",compact("goalData"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$goal = Goal::find($id);
        $goal['name']                   = $request->name;
        $goal['description']            = $request->description;
        $goal['target']                 = $request->target;
        $goal['start_date']             = $request->start_date;
        $goal['end_date']               = $request->end_date;
       // $goal['status']                 = $request->status;
        $goal['goal_data_entry_mode']   = $request->goal_data_entry_mode;
        $goal->update();
        return $goal;*/

        return response()->json($this->goal->updateGoal($request->all(),$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $goal = Goal::find($id);
        $goal->destroy($id);
        return $goal;*/
        return $this->goal->deleteGoal($id);
    }

    public function populateGoalTable($kpiIs)
    {
        return (response()->json($this->goal->showAllGoalsAgainstKpiId($kpiIs)));
    }

    // assign goal view
    public function assignGoalView()
    {
        // getting logged in user's level
        if(auth()->user()->level_id == 0)
        {
            $allLevels  = Level::all()->where("company_id","=",Auth::user()->company_id)
                ->where("parent_id","=",null);
        }
        else
        {
            $level      = Level::find(auth()->user()->level_id);
            $allLevels  = $level->getImmediateDescendants();
        }
        $allGoals = Goal::all()->where("user_id","=",Auth::id());
        return view("Goal.assign",compact("allGoals","allLevels"));
    }

    // all details of data against goal assigned to user
    public function details()
    {
        $i = 0;
        // fetching goals which are created by the logged in user
        $goals = Goal::all()->where("user_id","=",Auth::id());
        //    this function will fetch all the goal data where logged in user is the creator of goal with status 0
        // i.e my user id is 1 i created goal with id 1,2 then it will fetch all the goal data
        // where goal_id is 1 and 2 with status 0
        foreach ($goals as $goal)
        {
            $unApprovedGoalDatas = $goal->goalDatas()->where("is_approved","=",0)->where("actual_data","!=",0)->get();
            foreach ($unApprovedGoalDatas as $goalData)
            {
                $i++;
                $goalAndGoalDatas[] =
                    [
                        "goalDataId"       => $goalData->id,
                        "userId"           => $goalData->user_id,
                        "userName"         => $goalData->user->name,
                        "goalName"         => $goalData->goal->name,
                        "goalTarget"       => $goalData->goal->target,
                        "comment"          => $goalData->comment,
                        "TargetAchieved"   => $goalData->actual_data,
                        "dataEnteredDate"  => $goalData->data_entry_date,
                    ];
            }
        }
        if ($i == 0)
        {
            $goalAndGoalDatas = array();
        }

        $approvedDatas = $this->fetchApprovedRequests();
        $rejectedDatas = $this->fetchRejectedRequests();
        return view("goal.details",compact("goals","goalAndGoalDatas","approvedDatas","rejectedDatas"));
    }

    // fetch approve requests
    public function fetchApprovedRequests()
    {
        $i = 0;
        $goals           = Goal::all()->where("user_id","=",Auth::id());
        foreach ($goals as $goal)
        {
            $approvedRequests = $goal->goalDatas()->where("is_approved","=",1)->where("updated_at","!=",null)->get();
            foreach ($approvedRequests as $approvedRequest)
            {
                $i++;
                $allApprovedRequests[] =
                    [
                        "goalDataId"       => $approvedRequest->id,
                        "userName"         => $approvedRequest->user->name,
                        "goalName"         => $approvedRequest->goal->name,
                        "goalTarget"       => $approvedRequest->goal->target,
                        "comment"          => $approvedRequest->comment,
                        "TargetAchieved"   => $approvedRequest->actual_data,
                        "dataEnteredDate"  => $approvedRequest->data_entry_date,
                        "updateDate"       => $approvedRequest->updated_at,
                    ];
            }
        }
        if ($i == 0)
        {
               return  $allApprovedRequests = array();
        }

        else
        {
            return $allApprovedRequests;
        }

    }

    // rejected requests
    public function fetchRejectedRequests()
    {
        $i = 0;
        $goals           = Goal::all()->where("user_id","=",Auth::id());
        foreach ($goals as $goal)
        {
            $rejectedRequests = $goal->goalDatas()->where("is_approved","=",2)->get();
            foreach ($rejectedRequests as $rejectedRequest)
            {
                $i++;
                $allRejectedRequests[] =
                    [
                        "goalDataId"       => $rejectedRequest->id,
                        "userName"         => $rejectedRequest->user->name,
                        "goalName"         => $rejectedRequest->goal->name,
                        "goalTarget"       => $rejectedRequest->goal->target,
                        "comment"          => $rejectedRequest->comment,
                        "TargetAchieved"   => $rejectedRequest->actual_data,
                        "dataEnteredDate"  => $rejectedRequest->data_entry_date,
                        "updateDate"       => $rejectedRequest->updated_at,
                    ];
            }
        }
        if ($i == 0)
        {
            return  $allRejectedRequests = array();
        }

        else
        {
            return $allRejectedRequests;
        }
    }

    // block user list
    public function blockUserList()
    {
        $users = User::all()->where("company_id","=",Auth::user()->company_id)
            ->where("is_blocked","=",auth()->id());
        return view("user.block-user-list",compact('users'));
    }

    public function isExist($goalName,$kpiId)
    {
        return $this->goal->isExist($goalName, $kpiId);
    }
}
