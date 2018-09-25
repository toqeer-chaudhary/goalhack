<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Resource extends Model
{
    protected $fillable = [
        'controller_name','company_id', 'controller_action','node_id','parent_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function levels()
    {
        // giving the intermidiate table a name "permission"
        return $this->belongsToMany(Level::class)->as("permission")->
        withPivot("node_id")->withTimestamps();

    }

    // fetch all resources
    public function fetchAllResources()
    {
        return $this::all();
    }

    //store resources
    public function storeResources($controllerAndActions)
    {

        foreach ($controllerAndActions as $item)
        {
            // checking the count where this condition falls true
            $ResourceCount = Resource::where('controller_action',"=", $item["controller_action"])->
            where('controller_name',"=", $item["controller_name"])->
            where('company_id',"=", $item["company_id"])->count();

            if ($ResourceCount > 0)
            {
                // if count greater than zero i want to continue
                continue;
            }
            else
            {
                // store in db
               self::create($item);
            }
        }
    }

    public function deleteResource($id)
    {
        $resource = self::find($id);
        // deleting the resource
        self::destroy($id);
        // detaching from pivot table
        $resource->levels()->detach();
    }

    public function showAllResources()
    {
        // returning data grouped by controller name it will return data in from of controller name and its all methods
        return self::all()->where("company_id","=",Auth::user()->company_id)->groupBy("controller_name");
    }
}
