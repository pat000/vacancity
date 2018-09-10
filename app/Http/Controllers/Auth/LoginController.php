<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

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
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect()->getTargetUrl();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser){
            $credentials = $findUser;
            //$token = JWTAuth::fromUser($credentials);
            if ( ! $token = JWTAuth::attempt($credentials)) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ], 400);
            }
            return redirect('/#/')->withCookie(cookie('status',
                        json_encode([
                            'status' => 'success'
                        ]), 8000, null, null, false, false))->header('Authorization', $token);
                
        }else {
            $user = new User;
            $user->name = $userSocial->name;
            $user->lastname = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt('12345');
            $user->save(); 

            $credentials = $user;

            // event(new Registered($user));
            // UserVerification::generate($user);
            // UserVerification::send($user, 'Vacancity - Email Verification');

            //$token = JWTAuth::fromUser($credentials);
            // return redirect('/#/dashboard')->withCookie(cookie('authentication',
            // json_encode([
            //     'status' => 'success',
            // ]), 8000, null, null, false, false))->header('Authorization', $token);;

            if ( ! $token = JWTAuth::fromUser($credentials)) {
                throw new AuthorizationException;
            }
            return response([
                'status' => 'success'
            ])
            ->header('Authorization', $token);
            // Auth::login($user);
            // return $this->sendSuccessResponse();
        }
    }

    protected function sendSuccessResponse($token)
    {
        return redirect('/#/dashboard/')->header('Authorization', $token);
    }
}
