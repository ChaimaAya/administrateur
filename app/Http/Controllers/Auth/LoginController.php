<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $value = request()->userLogin;
        $userLogin = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        request()->merge([$userLogin => $value]);
        return $userLogin;
    }

    protected function attemptLogin(Request $request)
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 3)) { // tooManyAttempts tshof si le nombres des tentivites fat l 5
            $seconds = RateLimiter::availableIn($this->throttleKey($request)); // availableIn thsof qdah mzal waqyt ,remaining tshof qad mzal fama min tentivite

            throw ValidationException::withMessages([
                'userLogin' => "Trop de tentatives de connexion. Veuillez réessayer dans {$seconds} secondes.",
            ])->status(429);
        }

        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request)); //enregister une tentative infructueuse dans la classe RateLimiter

        throw ValidationException::withMessages([
            'userLogin' => ['Ces informations d\'identification ne correspondent pas à nos enregistrements.'],
        ])->status(422);
    }

    protected function throttleKey(Request $request)
    {
        return mb_strtolower($request->input($this->username())) . '|' . $request->ip();
    }
}
