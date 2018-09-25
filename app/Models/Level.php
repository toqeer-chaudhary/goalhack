<?php
namespace App\Models;
use App\Models\Company;
use App\Models\Resource;
use App\Models\User;
use Baum\Node;
use Illuminate\Database\Eloquent\Model;
use Auth;

/**
* Level
*/
class Level extends Node {

  /**
   * Table name.
   *
   * @var string
   */
  protected $table = 'levels';

  //////////////////////////////////////////////////////////////////////////////

  //
  // Below come the default values for Baum's own Nested Set implementation
  // column names.
  //
  // You may uncomment and modify the following fields at your own will, provided
  // they match *exactly* those provided in the migration.
  //
  // If you don't plan on modifying any of these you can safely remove them.
  //

  // /**
  //  * Column name which stores reference to parent's node.
  //  *
  //  * @var string
  //  */
  // protected $parentColumn = 'parent_id';

  // /**
  //  * Column name for the left index.
  //  *
  //  * @var string
  //  */
  // protected $leftColumn = 'lft';

  // /**
  //  * Column name for the right index.
  //  *
  //  * @var string
  //  */
  // protected $rightColumn = 'rgt';

  // /**
  //  * Column name for the depth field.
  //  *
  //  * @var string
  //  */
  // protected $depthColumn = 'depth';

  // /**
  //  * Column to perform the default sorting
  //  *
  //  * @var string
  //  */
  // protected $orderColumn = null;

  // /**
  // * With Baum, all NestedSet-related fields are guarded from mass-assignment
  // * by default.
  // *
  // * @var array
  // */
  // protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

  //
  // This is to support "scoping" which may allow to have multiple nested
  // set trees in the same database table.
  //
  // You should provide here the column names which should restrict Nested
  // Set queries. f.ex: company_id, etc.
  //

  // /**
  //  * Columns which restrict what we consider our Nested Set list
  //  *
  //  * @var array
  //  */
  // protected $scoped = array();

  //////////////////////////////////////////////////////////////////////////////

  //
  // Baum makes available two model events to application developers:
  //
  // 1. `moving`: fired *before* the a node movement operation is performed.
  //
  // 2. `moved`: fired *after* a node movement operation has been performed.
  //
  // In the same way as Eloquent's model events, returning false from the
  // `moving` event handler will halt the operation.
  //
  // Please refer the Laravel documentation for further instructions on how
  // to hook your own callbacks/observers into this events:
  // http://laravel.com/docs/5.0/eloquent#model-events
    protected $fillable = [
        'name', 'description','company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function resources()
    {
        // giving the intermidiate table a name "permission"
        return $this->belongsToMany(Resource::class)->as("permission")->
        withPivot("node_id")->withTimestamps();

    }

    public function storeLevel($levelData)
    {

        // saving data to the database and returning back the object
        $level = new Level();
        $usersCompnayId = Auth::user();
        $level->name = $levelData["name"];
        $level->description = $levelData["description"];
        $level->parent_id = $levelData["parent_id"];
        $level->company_id = $usersCompnayId->company_id;
        $level->save();
        return $level;
    }

    public function updateLevel($updateLevelData,$id)
    {
        $usersCompnayId = Auth::user();
        // updating the level
        $updateLevel                    = $this::find($id);
        $updateLevel->name              = $updateLevelData["name"];
        $updateLevel->description       = $updateLevelData["description"];
        $updateLevel->parent_id         = $updateLevelData["parent_id"];
        $updateLevel->company_id        = $usersCompnayId->company_id;
        $updateLevel->update();
        return $updateLevel;
    }

    public function showAllLevels()
    {
        // returning all levels
        return $this::all();
    }

    public function isExist($levelName)
    {
        // checking whether the name already exist or not
        return $this::all()->where("name","=",$levelName)
            ->where("company_id","=",auth()->user()->company_id)->count();
    }

    public function deleteLevel($id)
    {
        $level = $this::find($id);
        // deleting the level
        $this::destroy($id);
        // detaching from pivot table
        $level->resources()->detach();
        return $level;
    }

    public function storeLevelAndPermissions($request,$levelId)
    {

        //getting level id
        $level = $this::find($levelId);

        foreach ($request as $item)
        {
            //getting resource id
            $resourceId = Resource::where('controller_action',"=", $item["controller_action"])->
            where('controller_name',"=", $item["controller_name"])->where("company_id","=",Auth::user()->company_id)->first()->id;

            // checking if the resource id exist in the pivot table against the id if yes
            // then continue else store in db
            if ($level->resources()->wherePivot('resource_id', '=', $resourceId)->count() > 0)
            {
                continue;
            }
            else
            {
                // converting string to array format beacause attach exepts second parameter as array
                $nodeId["node_id"] = $item["node_id"];
                // attaching it to the level
                $level->resources()->attach($resourceId,$nodeId);
            }
        }
    }

    public function updateAssignedPermission($request,$LevelId){
        // getting level id
        $level = self::find($LevelId);
        // setting value to zero wheneve the function calls
        $i = 0;
        foreach ($request as $item)
        {
            // incrementing the i each time the loop runs why using "i" cz i want to access the resource id at ith index
            $i++;
            //getting resource id and storing in array
            $resourceId[] = Resource::where('controller_action',"=", $item["controller_action"])->
            where('controller_name',"=", $item["controller_name"])->first()->id;

            // creating an array in the required fromat do not understand just return it and see the result in network
            $resourceAndNodeIds [$resourceId[$i-1]] = [
                "node_id"=> $item["node_id"],
            ];
            //  return $resourceAndNodeIds;
        }
        // sync will add or remove on the basis of the array that is passed to it
        $level->resources()->sync($resourceAndNodeIds);

    }

    public function fetchPermissionsByLevelId($levelId)
    {
        // finding level
        $levelResources = self::find($levelId);
        foreach ($levelResources->resources as $resource)
        {
            // creating array of node ids
            $nodeIds[] = $resource->permission->node_id;
        }
        // returning data group by controller_name
        //  return $levelResources->resources->groupBy("controller_name");
        return $nodeIds;
    }

}
