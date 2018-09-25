<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Http\Requests\StoreLevelRequest;
use App\Models\Strategy;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ReflectionClass;

class LevelController extends Controller
{
    // creating a private variable to communicate with the level model
    private $level ;
    public function __construct(Level $levelObject)
    {
        // initiating the class variable with the model object
        $this->level = $levelObject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // and creating the object of helper class using dependency injection.
    public function index(Helpers\Helpers $helpers)
    {
        // calling the showAllLevels functions of the model and returning back the result to the view
        $allLevels      = Level::all()->where("company_id","=",Auth::user()->company_id);
        // calling the function resources of helper class
        $controllersAndActions =  $helpers->resources();
        // dd($ControllersAndActions);
        return view("level.index",compact("allLevels","controllersAndActions"));
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
    public function store(StoreLevelRequest $request)
    {
        // calling the storeLevel function of the model to store the data into the database
        // and returning the object back
        // validating the data from the StoreLevelRequest
       return response()->json($this->level->storeLevel($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($levelName)
    {
        // calling the isExist function of model to check if the level name exist or not
        // and returning 0 or 1 back
       return $this->level->isExist($levelName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($levelName)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLevelRequest $request, $id)
    {
        // calling the updateLevel function of model and returning back the response
        // validating the data from the StoreLevelRequest
        return response()->json($this->level->updateLevel($request->all(),$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // calling the deleteLevel function of model and deleting it.
        return $this->level->deleteLevel($id);
    }

    // function to assign permissions to level
    public function assign(Request $request,$levelId)
    {
        // extracting the objects value by its name wiz jsonObject and then passing it to the model
        // if you are not sure about what i am saying just try to return the $request and check your network tab
        // or dd the $request
        $controllerAndActions = $request->jsonObject;
        // and after that just dd or return $controllerAndActions
        // i can do this same thing in the model but i prefer it here
        return $this->level->storeLevelAndPermissions($controllerAndActions,$levelId);
    }

    public function updateAssignedPermission(Request $request, $LevelId)
    {
       $extractedObject = $request->jsonObject;

       return $this->level->updateAssignedPermission($extractedObject, $LevelId);
    }
    /**
     * @param level id
     * @return all permissionss against level id
     */

    public function fetchPermissions($levelId)
    {
        return $this->level->fetchPermissionsByLevelId($levelId);
    }

    /**
     * @param Helpers\Helpers $helpers
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function test(Helpers\Helpers $helpers)
  {
      // calling the function resources of helper class and creating the object of helper class
      // using dependency injection.
     $ControllersAndActions =  $helpers->resources();
    // dd($ControllersAndActions);
    //  return response()->json($ControllersAndActions);

      dd($ControllersAndActions);

  }

}
