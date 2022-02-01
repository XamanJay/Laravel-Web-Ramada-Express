<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;

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

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'Email no puede estar en blanco',
            'email.email' => 'Formato invalido',
            'password' => 'Password no puede estar en blanco'
        ];

        $this->validate($request,$rules,$messages);

        $url = url('/').'/api/login';

        $response = Http::post('http://gphoteles.test/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);


        $result = $response->json();

        $model = Sanctum::$personalAccessTokenModel;
        $accessToken = $model::findToken($result['token']);

        
        Auth::loginUsingId($accessToken->tokenable_id);
        return redirect()->route('home',['locale' => 'es']);
    }
}
