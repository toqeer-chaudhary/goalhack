<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Stripe\Stripe;



class PackageController extends Controller
{
    private $package;
    public function __construct(Package $packageobject)
    {
        $this->package=$packageobject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//
//        $packages=$this->package->showPackages();
//        return view('superAdmin.create', compact ('packages'));
//    }
    public function create()
    {

        $plans=$this->package->showPackagesFromStripe();
        $packages = $plans['data'];
        return view('superAdmin.create', compact ('packages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = \Validator::make($request->all(), [
            'package_name' => 'required|unique:packages|max:20',
            'package_amount' => 'required',
            'users' => 'required',
        ]);
        if ($validatedData->fails())
        {
            return response()->json(['errors'=>$validatedData->errors()->all()]);
        }
        return response()->json($this->package->storePackages($request->all(), $request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($packageName)
    {
        return $this->package->isExist($packageName);
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
    public function destroy(Request $request, $id)
    {
        return $this->package->deletePackage($request, $id);
    }
//    public function dellpackage($name)
//    {
//        return $this->package->deletePackage($name);
//    }
}
