<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kpi extends Model
{
    //    for soft deletes
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['goals'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'strategy_id','name', 'user_id','description' , 'target','rem_time' ,'start_date', 'end_date',
    ];
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function strategy()
    {
        return $this->belongsTo(Strategy::class);
    }
    public function showAllKpis()
    {
        return $this::all();
    }
    public function showKpi($id)
    {
        return $this::all()->find($id);
    }
    public function showAllKpisAgainstStrategyId($strategyIs)
    {
        return $this::all()->where("strategy_id","=",$strategyIs);
    }
    public function isExist($kpiName, $strategyId)
    {
        // checking whether the name already exist or not
        return $this::all()->where("name","=",$kpiName)
            ->where("strategy_id","=",$strategyId)->count();
    }
    public function storeKpi($data)
    {
        $kpi = $this::create($data);
        return $kpi;
    }
    public function deleteKpi($id)
    {
        // deleting the level
        $this::destroy($id);
    }
    public function updateKpi($request, $id)
    {

        $kpi                    = $this::find($id);
        $kpi->user_id           = Auth::id();
        $kpi->name              = $request["name"];
        $kpi->description       = $request["description"];
        $kpi->target            = $request["target"];
//        $kpi->status            = $kpi->status;
        $kpi->start_date        = $request["start_date"];
        $kpi->end_date          = $request["end_date"];
        $kpi->update();
        return $kpi;
    }

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
