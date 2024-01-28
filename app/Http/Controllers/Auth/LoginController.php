<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
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

    protected function redirectTo()
    {
        return '/';
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


    public function authenticate(Request $request)
	    {
			//Tomas las credenciales del request
	        $credentials = $request->only('email', 'password');
			//intentar encontrar al usuario en la base de datos con esas credenciales
			//Laravel hashea la passowrd solo
	        if (Auth::attempt($credentials)) {
	            // Si las credenciales son correctas, hacer cosas!
				// intended() devuelve al usuario a donde intentaba acceder
				// y acepta un default value
	            return redirect()->intended('dashboard');
	        }
	    }

    protected function authenticated(Request $request, $user)
    {
        if ($request->session()->has('redirect_to')) {
            return redirect($request->session()->pull('redirect_to'));
        }

        // Redirige a la vista de usuarios por defecto
        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {       
        
        $this->validateLogin($request);        
        if ($this->attemptLogin($request)) {
           
            return $this->sendLoginResponse($request);
        }       
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        // return $this->authenticated($request, $this->guard()->user())
        //         ?: redirect()->intended($this->redirectPath());

        return $this->authenticated($request, $this->guard()->user())
        ?: redirect()->route('home');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
