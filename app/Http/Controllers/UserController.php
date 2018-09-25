<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Company;
use App\Models\Management;
use Illuminate\Http\Request;
use App\Models\Vision;
use App\Models\Strategy;
use App\Models\Kpi;
use App\Models\Goal;
use App\Models\User;
use App\Models\Level;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyUser;
use DB;


class UserController extends Controller
{
    private $_user;
    public function __constructor(User $userObject)
    {
        $this->_user    = $userObject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = User::find(1);
//         dd($user->managements);
        $levels=Level::all()->where("company_id","=",auth()->user()->company_id);
        $users=User::all()->where("company_id","=",auth()->user()->company_id);
        return view('user.create', compact ('users','levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::all()->where("company_id","=",auth()->user()->company_id);
//        $c=count($users);
        //        validate the form
        \Stripe\Stripe::setApiKey("sk_test_Es7PjjvRg9Cd14kZJzBtzSiO");

        $customer = \Stripe\Customer::retrieve(auth()->user()->stripe_id);
        $subscription = $customer->subscriptions->data[0];
        $plan_users = $subscription->plan->metadata->users;

        if(count($users) <= $plan_users-1)
        {
            $users = new User();
            $loggedInUser = Auth::user();

            $users->company_id = $loggedInUser->company_id;
            $users->level_id = $request["level_id"];
            $users->name = $request['name'];
            $users->last_name = $request['last_name'];
            $users->email = $request['email'];
            $users->password = bcrypt($request['password']);
            $users->designation = $request['designation'];
            $users->contact = $request['contact'];
            $users->country = $request['country'];
            $users->province = $request['province'];
            $users->city = $request['city'];
            $users->image = mt_rand(1,4).".jpg";
            $users->address = $request['address'];
            $users->verify_token = Str::random(40);
            $users->save();
            //return $users;
            $thisUser = User::findOrFail($users->id);
            $this->sendEmail($thisUser);
            return $users;
        }
        else{
            return 1;
        }

    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyUser($thisUser));
    }

    public function sentUserEmail($email,$verifyToken)
    {

        $user = User::where(['email'=>$email, 'verify_token'=>$verifyToken])->first();
        $userInfo = User::all();
        if ($user)
        {

            User::where(['email'=>$email, 'verify_token'=>$verifyToken])->update(['status'=>'1']);
            return view('emails.account-activation', compact('user','userInfo'));
        }
        else
        {
            return 'user not found';
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $package = DB::table('users')->where('email', $email)->value('email');
        if ($package == $email)
        {
            return 1;
        }
        else{
            return 0;
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $user = User::find(auth()->id());
        return view("user.profile",compact("user"));
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
        $user = User::find($id);
        $user['name'] = $request->name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        $user['designation'] = $request->user_designation;
        $user['contact'] = $request->contact;
        $user['level_id'] = $request->user_level;
        $user['country'] = $request->country;
        $user['province'] = $request->province;
        $user['city'] = $request->city;
        $user['address'] = $request->address;

        $user->update();
        return $user;
    }

    public function userUpdate(UserUpdateRequest $request, $id)
    {

        // if the user level is 1 which means it is company that's why also updating data in company table
        if (Auth::user()->level_id == 0)
        {
            $company = Company::find(Auth::user()->company->id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->contact = $request->contact;
            $company->country = $request->country;
            $company->province = $request->province;
            $company->city = $request->city;
            $company->address = $request->address;
            $company->update();
        }
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $imageName = time().$file->getClientOriginalName();
            $file->move('assets/backend/images/users', $imageName);
        }
        $user = User::find($id);
        $user['name'] = $request->name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        $user['contact'] = $request->contact;
        $user['level_id'] = $request->user_level ? $request->user_level : $user->user_level ;
        $user['designation'] = $request->user_designation ? $request->user_designation : $user->designation;
        $user["image"]  = $request->hasFile('image') ? $imageName : $user->image;
        $user['country'] = $request->country;
        $user['province'] = $request->province;
        $user["password"] = bcrypt($request->password);
        $user['city'] = $request->city;
        $user['address'] = $request->address;

        $user->update();
        return redirect()->back()->with("success","Your Profile Has Been Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete($id);
    }

    // assign users
    public function assignUsers(Request $request)
    {
        // this condition will collect the require data base on functionality name
        // this data will be send to the assignUsers function in User model
        // the purpose is to make generic function.
        if ($request->functionalityName == "vision")
        {
            // functionality is the variable which will hold the strategy, vision, kpi, goal by functionalityId
            $functionality = Vision::find($request->functionalityId);
            return User::assignUsers($request->assignedUserIds,$request->loggedInUser,
                $functionality,$request->functionalityName);
        }
        else if ($request->functionalityName == "strategy")
        {
            $functionality = Strategy::find($request->functionalityId);
           return User::assignUsers($request->assignedUserIds,$request->loggedInUser,
               $functionality,$request->functionalityName);
//            return $request->functionalityId;
        }
        else if ($request->functionalityName == "kpi")
        {
            $functionality = Kpi::find($request->functionalityId);
            return User::assignUsers($request->assignedUserIds,$request->loggedInUser,
                $functionality,$request->functionalityName);
        }
        else
        {
            $functionality = Goal::find($request->functionalityId);
            return User::assignUsers($request->assignedUserIds,$request->loggedInUser,
                $functionality,$request->functionalityName);
        }


    }

    // fetching assigned users
    // will use this function to populate select 2 when user click on edit assign user
    public function fetchCreatorIdByFunctionalityId($functionalityId,Request $request)
    {

        // for example if the functionality name is strategy then it will go to the strategy model
        // and fetch the data from the strategy table where id = $functionalityId
        // $request->functionality has the name wiz may be vision,strategy,kpi,goal
        if ($request->functionality == "vision")
        {
            // functionality is the variable which will hold the strategy, vision, kpi, goal by functionalityId
            $functionality = Vision::find($functionalityId);
        }
        else if ($request->functionality == "strategy")
        {
            $functionality = Strategy::find($functionalityId);
//            return $functionality->users();
        }
        else if($request->functionality == "kpi")
        {
            $functionality = Kpi::find($functionalityId);
        }
        else
        {
            $functionality = Goal::find($functionalityId);
        }
         return $functionality->users;
//       // fetching all users where user_id  = $strategyCreatorId
//        $assignedUsers = User::fetchAllUsersByUser_id($creatorId);
//        // returning all users assigned to a strategy
//        return $assignedUsers;
    }

    // update assign users
    public function updateAssignUsers(Request $request)
    {
        // for example if the functionality name is strategy then it will go to the strategy model
        // and fetch the data from the strategy table where id = $functionalityId
        // $request->functionalityName has the name wiz may be vision,strategy,kpi,goal
        if ($request->functionalityName == "vision")
        {
            // functionality is the variable which will hold the strategy, vision, kpi, goal by functionalityId
            $functionality = Vision::find($request->functionalityId);
        }
        else if ($request->functionalityName == "strategy")
        {
            $functionality = Strategy::find($request->functionalityId);
        }
        else if($request->functionalityName == "kpi")
        {
            $functionality = Kpi::find($request->functionalityId);
        }
        else
        {
            $functionality = Goal::find($request->functionalityId);
        }
        // calling the updateAssignUsers function in User model in different way that
        // we adopt in assign user function above
         User::updateAssignUsers($request->reAssignedUsersIds,$request->loggedInUser,$functionality);
    }

    // Function for user detail
    public function userDetail($id)
    {
        $user = User::find($id);
        return $user;
    }
}
