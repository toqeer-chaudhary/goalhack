<?php

namespace App\Http\Controllers;

use App\Mail\ApproveDisapproveMail;
use App\Mail\BlockAndUnblockMail;
use App\Models\Location;
use App\Models\GoalData;
use App\Models\User;
use App\Notifications\ApproveOrDisapproveNotification;
use Illuminate\Http\Request;
use App\Models\Goal;
use DB;
use Illuminate\Support\Facades\Auth;
use Khill\Lavacharts\Lavacharts;


use Illuminate\Support\Facades\Mail;
use Midnite81\GeoLocation\Contracts\Services\GeoLocation;

use phpDocumentor\Reflection\Types\Self_;


class GoalDataController extends Controller
{
    private $goalData;
    private $locaiton;
    private $geo;
    private $user;
    public function __construct(GoalData $goalDataobject, Location $location, GeoLocation $geo,User $user)
    {
        $this->goalData=$goalDataobject;
        $this->locaiton = $location;
        $this->geo = $geo;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $location = $this->locaiton->showLoginUserLocation($this->geo,$request);
        //dd($location);
        //dd($ipLocation->getAddressString());
        $goals = Goal::all();
        return view('goalData.index',compact('goals','location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->locaiton->storeLocation($this->geo,$request);
        return response()->json($this->goalData->storeData($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goalAndKpi[] = "";
        $goal = Goal::find($id);
        array_push($goalAndKpi, $goal);
        $kpi = $goal->kpi;
        array_push($goalAndKpi, $kpi);
        $strategy = $kpi->strategy;
        array_push($goalAndKpi, $strategy);
        $vision = $strategy->vision;

        array_push($goalAndKpi,$vision);
//        $goaldata = GoalData::get()->all()->where('goal_id',$id);
////        $goaldata[] = DB::table('goal_datas')->where('goal_id', $id)->value('actual_data');
//        array_push($goalAndKpi,$goaldata);
        //dd("goalAndKpi : " .$goalAndKpi);

//        array_push($goalAndKpi, $vision);


        $goaldata = $this->goalData->showGoalData($id);
        array_push($goalAndKpi, $goaldata);
        $goaldataid = $this->goalData->showGoalDataid($id);
        array_push($goalAndKpi, $goaldataid);
        $goaldatacomment = $this->goalData->showGoalDataComment($id);
        array_push($goalAndKpi, $goaldatacomment);
        return $goalAndKpi;
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
    /*public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update(Request $request)
    {
//        return $request;
        //return response()->json($this->goalData->updateData($request));
        $requestActualData = $request->actual_data;
        $lenght = count($requestActualData);
        $actualData = DB::table('goal_datas')->select('actual_data')->where("goal_id","=", $request->goal_id)->get();
        //return $actualData;
        for ($i = 0 ;$i < $lenght ; $i++)
        {
            $goal = GoalData::find($request->goal_data_id[$i]["id"]);
            $goal->actual_data = $request-> actual_data[$i];
            $goal->comment = $request-> comment[$i];
            if($actualData[$i]->actual_data != $requestActualData[$i] )
            {
                $goal->is_approved = 0;
//                $goal->update();
            }
            $goal->update();
        }
        if($request->id != null)
        {
            $this->locaiton->storeLocation($this->geo,$request);
        }

    }

    // fetching goal details where user id = $userId and goal_id = $goalId
    public function goalDetailsByUserAndGoalId($userId, $goalId)
    {
        $goal = Goal::find($goalId);
        $goalData = GoalData::all()->where("user_id","=",$userId)
            ->where("goal_id","=",$goalId)->where("actual_data","!=",0);
//        array_push($arr,$goalData);
        return ["goalData"=>$goalData,"goal"=>$goal];
    }
    // this function will fetch all the data by date
    public function fetchActivitiesByDate($searchedDate)
    {
        $goals = Goal::all()->where("user_id", "=", Auth::id());

        $i = 0;
        foreach ($goals as $goal) {
//        $searchedDate." 00:00:00" using this because of carbon
            $goalDatas = $goal->goalDatas()->where("data_entry_date", "=", $searchedDate . " 00:00:00")
                ->where("actual_data","!=",0)->get();
            foreach ($goalDatas as $goalData) {
                $i++;
                // creating array of object with desired key and value
                $arrayOfGoalDetails[] =
                    ["userName" => $goalData->user->name,
                        "goalName" => $goalData->goal->name,
                        "goalTarget" => $goalData->goal->target,
                        "comment" => $goalData->comment,
                        "TargetAchieved" => $goalData->actual_data,
                        "goalDataUserId" => $goalData->user->id,
                        "goalDataId"    => $goalData->id
                    ];
            }
        }

            if ($i == 0) {
                return "";
            } else {
                return $arrayOfGoalDetails;
            }
    }
    // function to approve or disapprove
    public function approveOrDisapprove(Request $request)
    {
        $user    = User::find($request->userId);
        $manager = User::find(Auth::id());
        if ($request->string === "approve")
        {
            $this->goalData->changeApproveStatus($request->goalDataId);
            Mail::send(new ApproveDisapproveMail($user->name,$user->email,$request->actualDate,
                $request->comment,$manager->name,$manager->email,"Congratulations Data Entered Is Approved",
                $request->string));
            // sending notification to the user
            $user->notify(new ApproveOrDisapproveNotification($manager->name,$request->actualDate,"Approved",
                $user->name,$request->goalDataId));
        }
        else
        {
//            although it is bad practice but i am using it please dont use id
            if ($request->blockStatus === "Block And Send")
            {
//                calling the modal method
                $this->user->blockUser($request->userId);

                $this->goalData->changeDisApproveStatus($request->goalDataId);
                Mail::send(new ApproveDisapproveMail($user->name,$user->email,$request->actualDate,
                    $request->comment,$manager->name,$manager->email,"Data Entered Is Rejected",
                    "Rejected"));
//                sending block mail too
                Mail::send(new BlockAndUnblockMail($user->name,$user->email,
                    "Your account is blocked because of entering fake data continuously Please Visit Your Manager"
                    ,$manager->name,$manager->email,"You Are Blocked"));

                $user->notify(new ApproveOrDisapproveNotification($manager->name,$request->actualDate,"Rejected",
                    $user->name,$request->goalDataId));
            }
            else {
                 $this->goalData->changeDisApproveStatus($request->goalDataId);
                  Mail::send(new ApproveDisapproveMail($user->name,$user->email,$request->actualDate,
                      $request->comment,$manager->name,$manager->email,"Data Entered Is Rejected",
                      "Rejected"));
                  $user->notify(new ApproveOrDisapproveNotification($manager->name,$request->actualDate,"Rejected",
                      $user->name,$request->goalDataId));
            }
        }

    }

    public function populateTheMap($userId,$goalDataId)
    {
        $mapData = [];
        $user = User::find($userId);
        $cordinates =  $user->locations->where("goaldatas_id","=",$goalDataId);
        foreach ($cordinates as $cordinate)
        {
            $mapData[] = $cordinate;
        }
        return $mapData;
    }

    //function to block user
    public function blockUser($userId,$goalDataId)
    {
        $user = User::find($userId);
        $i = 0;
        foreach ($user->notifications as $notification)
        {
            if ($notification->data["goalDataId"] == $goalDataId && $notification->data["message"] === "Rejected")
            {
                $i++;
            }
        }
        return $i;

    }

// unblocking the user

    public function unblockUser($userId)
    {
        $this->user->unblockUser($userId);
    }

}
