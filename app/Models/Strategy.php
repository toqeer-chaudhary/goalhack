<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Strategy extends Model
{
    //    for soft deletes
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['kpis'];
    protected $dates = ['deleted_at'];


    protected $fillable = [
        // 'target',
        'user_id', 'vision_id', 'name','start_date', 'end_date',
    ];
    public function vision()
    {
        return $this->belongsTo(Vision::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function kpis()
    {
        return $this->hasMany(Kpi::class);
    }

    public function showAllStrategies()
    {
        return $this::all();
    }
    public function showAllStrategiesAgainstVisionId($VisionId)
    {
        return $this::all()->where("vision_id","=",$VisionId)
            ->where("user_id","=",Auth::id());
    }

    public function storeStrategy($request)
    {
        $strategy = new Strategy();
        $strategy->vision_id    = $request["visionId"];
        $strategy->user_id      = Auth::id();
        $strategy->name         = $request["strategyName"];
        $strategy->description  = $request["strategyDescription"];
//        $strategy->target       = $request["strategyTarget"];
//        $strategy->status       = "assigned";
        $strategy->start_date   = $request["strategyStartDate"];
        $strategy->end_date     = $request["strategyEndDate"];
        $strategy->save();
        return $strategy;
    }

    public function updateStrategy($updateStrategyData,$id)
    {
        // updating the level
        $updateStategy               = $this::find($id);
        $updateStategy->vision_id    = $updateStrategyData["visionId"];
        $updateStategy->user_id      = Auth::id();
        $updateStategy->name         = $updateStrategyData["strategyName"];
        $updateStategy->description  = $updateStrategyData["strategyDescription"];
//        $updateStategy->target       = $updateStrategyData["strategyTarget"];
//        $updateStategy->status       = $updateStrategyData["strategyStatus"];
        $updateStategy->start_date   = $updateStrategyData["strategyStartDate"];
        $updateStategy->end_date     = $updateStrategyData["strategyEndDate"];
        $updateStategy->update();
        return $updateStategy;
    }

    public function deleteStrategy($strategyId)
    {
        $this::destroy($strategyId);
    }

    public function isExist($strategyName,$visionId)
    {
        // checking whether the name already exist or not
        return $this::all()->where("name","=",$strategyName)
            ->where("vision_id","=",$visionId)->count();
    }

    // to show details of a particual strategy
    public function showDetails($id)
    {
        return self::find($id);
    }

    //  fetching user by strategy Id
    public static function fetchCreatorIdByStrategyId($strategyId)
    {
        // fetching a strategy
        $strategy  = Strategy::find($strategyId);
        // fetching creator of the strategy
        $strategyCreatorId    = $strategy->user->id;
        // returning userId
        return $strategyCreatorId;
    }
}
