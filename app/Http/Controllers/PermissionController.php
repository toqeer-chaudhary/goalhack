<?php

namespace App\Http\Controllers;


use App\Models\Level;
use App\Helpers;
use App\Models\Resource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Error\Permission;

class PermissionController extends Controller
{

    private $level;
    private $resource;
    public function __construct(Level $levelObject, Resource $resourceObject)
    {
        $this->level    = $levelObject;
        $this->resource = $resourceObject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Helpers\Helpers $helpers)
    {
        $allLevels      = Level::all()->where("company_id","=",Auth::user()->company_id);
        // calling all the showAllLevels functions of the model and returning back the result to the view
        $allResources   = $this->resource->showAllResources();

        return view("permission.index",compact("allLevels","allResources"));
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
    public function update(Request $request, $LevelId)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
