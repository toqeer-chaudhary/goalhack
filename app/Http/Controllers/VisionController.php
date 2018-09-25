<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisionController extends Controller
{

    private $vision;
    private $user;
    public function __construct(Vision $visionObject, User $userObject){
        $this->vision=$visionObject;
        $this->user      = $userObject;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visions=Vision::all()->where("company_id","=",Auth::user()->company_id);
        return view('vision.index', compact ('visions'));
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
        return response()->json($this->vision->storeVision($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
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
        return response()->json($this->vision->updateVision($request->all(),$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->vision->deletevision($id);
    }

    public function fetchVisionDate($id)
    {
        $vision = Vision::find($id);
        return $vision;
    }

    public function assignVisionView()
    {
//        // getting logged in user's level
//        $loggedInUsersLevel = Auth::user()->level_id;
//        // getting the level object
//        $level      = Level::find($loggedInUsersLevel);
//        $allLevels  = $level->getImmediateDescendants();
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
        $allVisions = Vision::all()->where("company_id","=",Auth::user()->company_id);
        return view("vision.assign",compact("allVisions","allLevels"));

    }
    public function detailShow($id)
    {
        $visionData = $this->vision->showDetails($id);
        return view("vision.show",compact("visionData"));
    }
    public function isExist($visionName,$companyId)
    {
        return $this->vision->isExist($visionName, $companyId);
    }
}
