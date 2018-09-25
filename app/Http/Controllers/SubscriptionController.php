<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Licence;
use Auth;
use Stripe\Invoice;
use Stripe\Stripe;
use Stripe_Charge;
use Stripe_Customer;
use Stripe_InvalidRequestError;
use Stripe_CardError;
use Config;
use Mail;
use App\Mail\SubscriptionNotification;
use App\Mail\SendNotifyEmail;
use DB;

class SubscriptionController extends Controller
{
    private $_PackageModel;
    private $_PaymentModel;
    private $_LicenseModel;
    private $_CompanyModel;
    private $_Invoice;
    public function __construct(Package $package, Payment $payment, Company $company, Licence $licence, InvoiceController $invoiceController)
    {
        $this->middleware('auth');
        $this->_PackageModel = $package;
        $this->_PaymentModel = $payment;
        $this->_LicenseModel = $licence;
        $this->_CompanyModel = $company;
        $this->_Invoice = $invoiceController;
    }
    public function packages()
    {
        return $this->_PackageModel->showPackagesFromStripe();
    }

    public function subscription()
    {
        $plans = $this->packages();
        $packages =$plans['data'];
        //dd($packages[0]);
        return view('payment.payment', compact('packages'));
    }

    public function postSubscription(Request $request)
    {
        $user = Auth::user();
        $companyId = DB::table('companies')->where('email', $user->email)->value('id');

        $package = $this->_PackageModel->getPackageByName($request->subscription);

        $user->card_brand  = $request->card_brand;
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $user->newSubscription('main',$request->subscription)->create($request->token);
        if ($user->subscribed('main'))
        {
            $user->save();
            $key = $this->_LicenseModel->createLicense();

            Mail::send(new SubscriptionNotification($key));

            return response()->json(['msg'=>'Successfully subscribed']);
        }
        return response()->json(['msg'=>'Oops there is something error with your input']);
    }

    public function cancelSubscription($id)
    {
        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

        $subscription = \Stripe\Subscription::retrieve($id);
        $subscription->cancel();
        return view('home.cancel-subscription');
    }
    public function show($id)
    {
        $package =  $this->_PackageModel->showPackage($id);
        return $package;
    }

    //Company Email Verification
    public function verifyEmail($email)
    {
        $companyEmail = DB::table('companies')->where('email', $email)->value('email');
        return $companyEmail;
    }



    public function retrieveInvoices(Request $request)
    {
        $user     = $request->user();
        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

        $invoices =  \Stripe\Invoice::upcoming(array("customer" => $user->stripe_id))->lines->all();
        //$invoices =  \Stripe\Invoice::retrieve("upcoming", )->lines->all();

        //dd($invoices);
        return view('vision.payment', compact('invoices'));
    }


}
