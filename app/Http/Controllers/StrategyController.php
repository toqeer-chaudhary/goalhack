<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStrategyRequest;
use App\Models\Level;
use App\Models\Resource;
use App\Models\Vision;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Strategy;
use Illuminate\Support\Facades\Auth;

class StrategyController extends Controller
{

    private $strategy ;
    private $user ;
    public function __construct(Strategy $strategyObject, User $userObject)
    {
//        $this->middleware('auth');
        $this->strategy = $strategyObject;
        $this->user     = $userObject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        // fetching all visions that are assigned to this user
        $allVisions    = $user->visions;
        $allStrategies = $this->strategy->showAllStrategies();
        return view("strategy.index",compact("allStrategies","allVisions"));
    }

    // to return the dashboard for strategy user
    public function dashboard()
    {
        return view("strategy.dashboard");
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
    public function store(StoreStrategyRequest $request)
    {
        return response()->json($this->strategy->storeStrategy($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $strategyData = $this->strategy->showDetails($id);
        return view("strategy.show",compact("strategyData"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {

    }

//    checking if strategy name exist
    public function isExist($strategyName,$visionId)
    {
        return $this->strategy->isExist($strategyName,$visionId);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStrategyRequest $request, $id)
    {
        return response()->json($this->strategy->updateStrategy($request->all(),$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->strategy->deleteStrategy($id);
    }

    public function populateStrategyTable($visionIs)
    {
        return (response()->json($this->strategy->showAllStrategiesAgainstVisionId($visionIs)));
    }
    public function fetchStrategyDate($id)
    {
        $strategy = Strategy::find($id);
        return $strategy;
    }
    
    // assign strategy view
    public function assignStrategyView()
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
        $allStrategies = Strategy::all()->where("user_id","=",Auth::id());
        return view("strategy.assign",compact("allStrategies","allLevels"));
    }

//    // update assign users
//    public function updateAssignUsers(Request $request)
//    {
//        $this->user->updateAssignUsers($request);
//    }
}
