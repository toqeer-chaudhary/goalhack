<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required',
            'email'    => 'required|email|unique:companies',
            'password' => 'required|confirmed',
            'address'  => 'required',
            'contact'  => 'required',
            'website'  => 'required',
            'country'  => 'required',
            'province' => 'required',
            'city'     => 'required',
            'g-recaptcha-response' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Company
     */
    protected function create(array $data)
    {
        //dd($data);
        $comp = Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'website' => $data['website'],
            'country' => $data['country'],
            'province' => $data['province'],
            'city' => $data['city'],
        ]);
        //dd($comp->verify_token);
        //return $comp;
        $randomString = Str::random(20);
        $user = User::create([
            'name' => $comp->name,
            'level_id'=>'0',
            'email' => $comp->email,
            'company_id' => $comp->id,
            'password' => bcrypt($data['password']),
            'address' => $comp->address,
            'designation' => 'Admin',
            'contact' => $comp->contact,
            'country' => $comp->country,
            'province' => $comp->province,
            'image' => mt_rand(1,4).".jpg",
            'city' => $comp->city,
            'verify_token' => Str::random(40),

        ]);
        //dd($user->verify_token);
        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;

    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function register(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|unique:companies',
            'email'    => 'required|email|unique:companies',
            'password' => 'required|confirmed|min:6',
            'address'  => 'required',
            'contact'  => 'required',
            'website'  => 'required',
            'country'  => 'required',
            'province' => 'required',
            'city'     => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        $registerCompany = new Company();
        $registerCompany->name      = $request->name;
        $registerCompany->email     = $request->email;
        $registerCompany->password  = Hash::make($request->password);
        $registerCompany->address   = $request->address;
        $registerCompany->contact   = $request->contact;
        $registerCompany->website   = $request->website;
        $registerCompany->country   = $request->country;
        $registerCompany->province  = $request->province;
        $registerCompany->city      = $request->city;
        $registerCompany->verify_token      = Str::random(40);
        $registerCompany->save();

        $registerCompany = Company::findOrFail($registerCompany->id);
        $this->sendEmail($registerCompany);
        //dd($registerCompany);
        Session::flash('success', 'Your Company Registered Successfully! But verify email first');
        return redirect(route('verify-email'));
    }*/

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmail()
    {
        return view('emails.verfiy-email');
    }

    public function sentEmail($email,$verifyToken)
    {

        $user = User::where(['email'=>$email, 'verify_token'=>$verifyToken])->first();
        if ($user)
        {
            User::where(['email'=>$email, 'verify_token'=>$verifyToken])->update(['status'=>'1']);
            return view('emails.account-activation', compact('user'));
        }
        else
        {
            return 'user not found';
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        return redirect(route('verify-email'));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
