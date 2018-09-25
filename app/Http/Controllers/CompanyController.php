<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Licence;
use App\Models\User;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Auth;
use Stripe\Stripe;
use Stripe_Charge;
use Stripe_Customer;
use Stripe_InvalidRequestError;
use Stripe_CardError;
use DB;
use Mail;
use Hash;

class CompanyController extends Controller
{
    private $subscription;
    private $license;
    private $user;
    public function __construct(SubscriptionController $sub, Licence $licence, User $user)
    {
        $this->middleware('auth');
        $this->subscription = $sub;
        $this->license = $licence;
        $this->user = $user;
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
    /*public function store(Request $request)
    {
       /* $companyData = new Company();

        $companyData->name      = $request->company_name;
        $companyData->email     = $request->company_email;
        $companyData->password  = $request->company_password;
        $companyData->address   = $request->company_address;
        $companyData->contact   = $request->company_contact;
        $companyData->website   = $request->company_website;
        $companyData->country   = $request->company_country;
        $companyData->province  = $request->company_province;
        $companyData->city      = $request->company_city;

        $companyData->save();
//        return response()->json($companyData);
        return redirect()->back();*/
    //}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $company = Company::find($id);
        //dd($company);
        return view('home.profile', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $company = Company::find($id);

        return view('home.editcompany', compact('company'));
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
        //dd($request);
        $company = Company::find($id);

        $company['name'] = $request['name'];
        $company['email'] = $request['email'];
        $company['address'] = $request['address'];
        $company['contact'] = $request['contact'];
        $company['website'] = $request['Website'];
        $company['city'] = $request['city'];
        $company['province'] = $request['province'];
        $company['country'] = $request['country'];
        $company['password'] = $request['password'];
        $company->update();
        //return redirect()->to('CompanyController@show');
        return view('home.profile', compact('company'));
        //return redirect()->to('home.profile', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ChangePassword()
    {
        return view('home.password', compact('id'));
    }

    public function store(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
// The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
//Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        /*$validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|confirmed',
        ]);*/
//Change Password
        $user = Auth::user();

        $user->password = bcrypt($request->get('new-password'));
        $user->update();
        return redirect()->back()->with("success", "Password changed successfully !");

    }
    public function expireLiciense()
    {
       // $companies = array();
        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

        $invoices = \Stripe\Invoice::all();
        foreach ($invoices->data as $invoice)
        {
            if(($invoice->paid == false) && ($invoice->closed == false))
            {
                $subscription = $invoice->subscription;
                $customer = $invoice->customer;

                $user = DB::table('users')->where('stripe_id', $customer)->get();
                foreach ($user as $usr)
                {
                    $com_id = $usr->company_id;

                    $license = Licence::all()->where("company_id","",$com_id);
                    $i = 0;
                    foreach($license AS $key){
                        if($key[$i] == $i){
                            //dd($key);
                            $li = $key;
                            $li->isExpire = 0;
                            $li->update();
                            $i = -1;
                        }
                        $i++;
                    }
                    //dd("Found : " . $key_in_array->id);

                    $this->user->changeCustomer($usr->id);

                    \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

                    $subscription = \Stripe\Subscription::retrieve($subscription);
                    $subscription->cancel();
                }

                //array_push($companies, $strategy);
            }
        }
    }

}
