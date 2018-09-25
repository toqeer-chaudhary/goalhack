<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Goal;
use App\Models\Kpi;
use App\Models\Level;
use App\Models\Strategy;
use App\Models\User;
use App\Models\Vision;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $companies = Company::all();
        $visions = Vision::all();
        $strategies = Strategy::all();
        $kpis = Kpi::all();
        $goals = Goal::all();
        $levels = Level::all();
        return view('superAdmin.index',
            compact("users", "companies", "visions", "strategies", "kpis", "goals", "levels"));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 3;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$company = Company::find($id);
        $company->update(['status'=>'0']);
        return redirect()->back();*/
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$company = Company::find($id);
        $company->update(['status'=>'1']);
        return redirect()->back();*/
    }

    //function to disable company
    public function disableCompany($id)
    {
        $users = User::all()->where('company_id', '=', $id);
        foreach ($users as $user)
        {
            $user->status = 0;
            $user->update();
        }
        return $user;
        /*$company = Company::find($id);
        $company->status = 0;
        $company->update();
       return $company;*/
    }

    //function to enable company
    public function enableCompany($id)
    {
        $users = User::all()->where('company_id', '=', $id);
        foreach ($users as $user)
        {
            $user->status = 1;
            $user->update();
        }
        return $user;
        /*$company = Company::find($id);
        $company->status = 1;
        $company->update();
        return $company;*/
    }

}
