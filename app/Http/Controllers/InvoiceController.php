<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Stripe\Stripe;
use Stripe_Charge;
use Stripe_Customer;
use Stripe_InvalidRequestError;
use Stripe_CardError;
use DB;
use Mail;
use App\Mail\InvoiceGenerate;
use App\Mail\GenerateInvoice;
class InvoiceController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Invoices methods
    public function invoices()
    {
        try {


            $user = Auth::user();

            // $invoices = $user->invoices();
            \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

            $invoices = \Stripe\Invoice::all(array("limit" => 100, "customer"=> $user->stripe_id));

            $invoices = $invoices->data;

            return view('superAdmin.payment', compact('invoices', 'user'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function invoice($invoice_id)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = Auth::user();

            return $user->downloadInvoice($invoice_id, [
                'vendor'  => 'Your Company',
                'product' => 'Your Product',
            ]);

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function generateInvoice()
    {

        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

        $customers = \Stripe\Customer::all();
        $sub_id;

        foreach ($customers->data as $customer)
        {
            foreach ($customer->subscriptions->data as $subscription) {
                //dd($subscription->plan->amount);

                if ($subscription->status == "active")
                {
                    if($subscription->plan->id)
                    {
                        // Create Invoice
                        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

                        \Stripe\InvoiceItem::create(array(
                                "customer" => $customer->id,
                                'subscription'=> $subscription->id,
                                "amount" => $subscription->plan->amount,
                                "currency" => "usd",
                                "description" => "Charge for Subscription Plan")
                        );

                        $subscription = \Stripe\Invoice::create([
                            'customer' => $customer->id,
                            'subscription'=> $subscription->id,
                            //'items' => [['plan' => $subscription->plan->id]],
                            'billing' => 'send_invoice',
                            'days_until_due' => 7,
                        ]);

                    }
                }

                //Mail::to('mygoalhack@gmail.com')->send(new GenerateInvoice($subscription));
                Mail::send(new InvoiceGenerate($subscription));
            }

        }
    }


}
