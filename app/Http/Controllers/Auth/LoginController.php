<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $remember = $request->has('remember');

        if ($this->attemptLogin($request, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectPath());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function attemptLogin(Request $request, $remember)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $remember
        );
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();   

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $cookie = Cookie::forget('remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        Cookie::queue($cookie); 
        return redirect('/')->withCookie($cookie);
    }
}
