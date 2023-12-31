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
     * Determinate if the request field is email or username.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function field(Request $request)
    {
        $email = $this->username();
        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'username';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $field = $this->field($request);
        $message = [
            "{$this->username()}.exists" =>
            'The account you are trying to login is not registered or it has been disabled.'
        ];
        $this->validate($request, [
            $this->username() => "required|string|exists:users,{$field}",
            'password' => 'required|string',
        ], $message);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field = $this->field($request);
        return [
            $field => $request->get($this->username()),
            'password' => $request->get('password')
        ];
        // return $request->only($this->username(), 'password');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'kelompok') {
            return redirect()->route('kelompok.index');
        } elseif ($user->role === 'apel') {
            return redirect()->route('apel.index');
        } else {
            return redirect('/'); // Change this line to your preferred route.
        }
    }
}
