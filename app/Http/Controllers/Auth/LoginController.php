<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Company;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        if (auth()->user()->level_id == 0 && auth()->user()->stripe_id == null )
        {
            return redirect()->to("subscription")->with("warning","Please Subscribe First To Continue");
        }
        elseif (auth()->user()->company->licence->isExpire == 0)
        {
            return redirect()->route("access.expire");
        }
        elseif ($this->guard()->user()->status == 0)
        {
            $this->guard()->logout();
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors(['active' => 'User in not activated. Please verify email.']);
        }
        elseif (check_resource("App\Http\Controllers\VisionController@store") == 1)
        {
            return redirect()->to("vision-dashboard");
        }
        elseif (check_resource("App\Http\Controllers\StrategyController@store") == 1)
        {
            return redirect()->to("strategy-dashboard");
        }
        elseif (check_resource("App\Http\Controllers\KpiController@store") == 1)
        {
            return redirect()->to("kpi-dashboard");
        }
        elseif (check_resource("App\Http\Controllers\GoalController@store") == 1)
        {
            return redirect()->to("goal-dashboard");
        }
        elseif (check_resource("App\Http\Controllers\GoalDataController@store") == 1)
        {
            return redirect()->to("goal-data-dashboard");
        }
        else
        {
            return redirect()->to("home");
        }

//        return $this->authenticated($request, $this->guard()->user())
//            ?: redirect()->intended($this->redirectPath());

    }

}
