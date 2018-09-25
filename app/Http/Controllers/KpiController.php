<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Strategy;
use App\Models\Kpi;
use Auth;

class KpiController extends Controller
{
    private $_KpiModel;
    private $user;
    public function __construct(Kpi $kpi,User $userObject)
    {
//        $this->middleware('auth');
        $this->_KpiModel = $kpi;
        $this->user      = $userObject;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());

        // fetching all visions that are assigned to this user
        $allStrategies    = $user->strategies;
        $allKpi = $this->_KpiModel->showAllKpis();
        return view("kpi.index",compact("allStrategies","allKpi"));
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
        $validator = \Validator::make($request->all(), [
            'strategy_id' => 'required',
            'name' => 'required',
            'target' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        return response()->json($this->_KpiModel->storeKpi($request->all()));
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
        return response()->json($this->_KpiModel->updateKpi($request->all(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->_KpiModel->deleteKpi($id);
    }
    // to return the dashboard for kpi user
    public function dashboard()
    {
        return view("kpi.dashboard");
    }

    public function populateKpiTable($strategyIs)
    {
        return (response()->json($this->_KpiModel->showAllKpisAgainstStrategyId($strategyIs)));
    }

    // assign kpi view
    public function assignKpiView()
    {
        // getting logged in user's level
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
        $allKpis = Kpi::all()->where("user_id","=",Auth::id());
        return view("kpi.assign",compact("allKpis","allLevels"));
    }
    //kpi detail page
    public function detailShow($id)
    {
        $kpiData = $this->_KpiModel->showDetails($id);
        return view("kpi.show",compact("kpiData"));
    }

    public function isExist($kpiName, $strategyId)
    {
        return $this->_KpiModel->isExist($kpiName, $strategyId);
        //return $id;
    }

    public function fetchKpiDate($id)
    {
        $kpi= Kpi::find($id);
        return $kpi;
    }
}
