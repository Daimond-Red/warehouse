<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm() {
		session_start();
        if( \request('checkSessionRequest') ) {

            $type = 0;
			
			if(isset($_SESSION['usertype'])) $type = $_SESSION['usertype'];

            $model = User::where('api_login_type', $type)->first();

            if(!$model) return redirect()->to('../../login.html')->withErrors('Invalid params send');

            auth()->loginUsingId($model->id);

            session()->put('apiLogin', true);

            return redirect()->route('home');

        }

        return view('auth.login');
    }

    public function logout(Request $request) {

        if( session('apiLogin') ) {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect()->to('../../login.html');
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect()->route('login');
        }

    }
	
	
}
