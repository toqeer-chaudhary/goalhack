<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vision extends Model
{
//    for soft deletes
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['strategies'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'target','description','start_date', 'end_date','company_id',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function strategies()
    {
        return $this->hasMany(Strategy::class);
    }
    public function storeVision($storevision)
    {
//        return $storevision;
        return $this::create($storevision);
    }
    public function updateVision($updateVisionData,$id)
    {
        $updateVision                    = $this::find($id);
        $updateVision->name              = $updateVisionData["name"];
        $updateVision->target            = $updateVisionData["target"];
        $updateVision->description       = $updateVisionData["description"];
        $updateVision->start_date        = $updateVisionData["start_date"];
        $updateVision->end_date          = $updateVisionData["end_date"];
        $updateVision->update();
        return $updateVision;
    }
    public function deletevision($id)
    {
        // deleting the level
        $this::destroy($id);
    }
    public function isExist($visionName, $companyId)
    {
        // checking whether the name already exist or not
        return $this::all()->where("name","=",$visionName)
            ->where("company_id","=",$companyId)->count();

    }

    public function showAllVisions()
    {
        return $this::all();
    }

    // this is the built in method please dont touch it
    // i use it to apply carbon functions on it
    // if i do not add start_Date adn end_date in it the carbon functions will not work
    // this function converts date into carbon format (not sure)
    public function getDates()
    {
        return ['created_at','updated_at','start_date','end_date'];
    }
    // to show details of a particual vision
    public function showDetails($id)
    {
        return self::find($id);
    }

}
