<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    //    for soft deletes
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['goalDatas'];
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'kpi_id','user_id','name','target','goal_data_entry_mode','description' ,'start_date', 'end_date',
    ];
    public function goalDatas()
    {
        return $this->hasMany(GoalData::class);
    }
    public function Kpi()
    {
        return $this->belongsTo(Kpi::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function showAllGoalsAgainstKpiId($kpiIs)
    {
        return $this::all()->where("kpi_id","=",$kpiIs);
    }

    public function storeGoal($storeGoal)
    {
        return $this::create($storeGoal);
    }

    public function updateGoal($updateGoal,$id)
    {
        $goal = $this::find($id);

        $goal->name                 = $updateGoal['name'];
        $goal->user_id                = Auth::id();
        $goal->description          = $updateGoal['description'];
        $goal->target               = $updateGoal['target'];
        $goal->start_date           = $updateGoal['start_date'];
        $goal->end_date             = $updateGoal['end_date'];
        $goal->goal_data_entry_mode = $updateGoal['goal_data_entry_mode'];
        $goal->update();

        return $goal;
    }

    public function deleteGoal($id)
    {
        $this::destroy($id);
    }
    public function showDetails($id)
    {
        return self::find($id);
    }

    public function showAllGoals()
    {
        return $this::all();
    }
    public function isExist($goalName,$kpiId)
    {
        // checking whether the name already exist or not
        return $this::all()->where("name","=",$goalName)
            ->where("kpi_id","=",$kpiId)->count();
    }

}
