<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.frontend-home');
    }
    public function about()
    {
        return view('home.about');
    }
    public function contact()
    {
        return view('home.contact');
        /*return view('home.contact');*/
    }


    public function plans()
    {

        $plans=Package::paginate(3);
        return view('home.plan', compact('plans'));
    }

    public function activation()
    {
        return view('emails.account-activation');
    }




}
