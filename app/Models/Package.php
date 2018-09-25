<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Stripe\Stripe;

class Package extends Model
{
    protected $fillable = [
        'package_name','package_amount','users',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function storePackages($PackageData, $request)
    {


        //$package=$this::create($PackageData);
        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

        \Stripe\Plan::create(array(
            "amount" => $request->package_amount,
            "interval" => "month",
            "product" => array(
                "name" => $request->package_name,
                "metadata"=>array("users"=>$request->users)

            ),
            "metadata"=>array("users"=>$request->users),

            "nickname" => $request->package_name,
            "currency" => "usd",
            "id" => $request->package_name,
        ));



        return $this::create($PackageData);
    }
    public function showPackages()
    {
        return $this->all();
    }
    public function showPackagesFromStripe()
    {
        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");
        $plans = \Stripe\Plan::all();
        return $plans;
    }

    public function deletePackage($request, $id)
    {

        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");
        $plann = \Stripe\Plan::retrieve($request->package_name);

        $subscriptions = \Stripe\Subscription::all();


        foreach ($subscriptions->data as $sub)
        {
            $plan = $sub->plan;

            if($plan->id == $request->package_name)
            {
                return 1;
            }
            else
            {
                $plann->delete();
                $package = Package::where('package_name',"=",$request->package_name)->first();

                self::destroy($package->id);
                return "Plan Deleted";
            }

        }


        //return $subscriptions->data[0]->plan;
    }


    public function showPackage($id)
    {
        //return $this->find($id);
        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");
        return \Stripe\Plan::retrieve($id);
    }
    public function isExist($packageName)
    {
        // checking whether the name already exist or not
        return $this::all()->where("package_name","=",$packageName)->count();
    }

    //getPackageID
    public function getPackageByName($packageName)
    {
        $package = DB::table('packages')->where('package_name', $packageName)->get();
        return $package;
    }
}
