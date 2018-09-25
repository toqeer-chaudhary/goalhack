<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResourceRequest;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Helpers;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    private $resource;

    public function __construct(Resource $resourceObject)
    {
        $this->resource = $resourceObject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // and creating the object of helper class using dependency injection.
    public function index(Helpers\Helpers $helpers)
    {
        // fetching all resources
        $allResources = Resource::all()->where("company_id","=",Auth::user()->company_id);
        // calling the function resources of helper class
        $controllersAndActions =  $helpers->resources();
        // dd($ControllersAndActions);
        return view("resource.index",compact("allResources","controllersAndActions"));
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
        $controllerAndActions = $request->jsonObject;
        // and after that just dd or return $controllerAndActions
        // i can do this same thing in the model but i prefer it here
        $this->resource->storeResources($controllerAndActions);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->resource->deleteResource($id);
    }
}
