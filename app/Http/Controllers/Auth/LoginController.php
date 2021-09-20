<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = 'dashboard';

    
    public function showLoginForm(){
        return view('auth.login');
    }

    public function Verification(){
        request()->validate([
            'pseudo'=> 'required',
            'password'=> 'required'
        ]);
        $resultat = auth()->attempt([
            'pseudo'=>request('pseudo'),
            'password'=>request('password'),
        ]);
        if ($resultat) {
            return redirect('dashboard');
        }else{
            return back()->with('error', 'Votre pseudo ou votre mot de passe est incorrect');
        }

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('login');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
