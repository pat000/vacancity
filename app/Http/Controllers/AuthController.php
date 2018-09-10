<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Carbon\Carbon;

class AuthController extends Controller
{
    //
    private const REDIRECT_DASHBOARD = '/#/';
    private const REDIRECT_LOGIN = '/#/login';

    public function register(RegisterFormRequest $request)
    {   
            $slug = str_slug( $request->name.' '.$request->lastname.' '.rand(), '-');

            $user = new User;
            $user->email = $request->email;
            $user->lastname = $request->lastname;
            $user->name = $request->name;
            $user->slug_name = $slug;
            $user->password = bcrypt($request->password);
            $user->save();
        
            UserVerification::generate($user);
            UserVerification::send($user, 'Reminder - Verify Email');

            return response([
                'status' => 'success',
                'data' => $user->email,
            ], 200);
    }
    public function login_(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ( ! $token = JWTAuth::attempt($credentials)) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ], 400);
        }
        return response([
                'status' => 'success'
            ])
            ->header('Authorization', $token);
    }
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response([
                'status' => 'success',
                'data' => 
                    [
                        'email' => $user->email,
                        'name' => $user->name,
                        'lastname' => $user->lastname,
                        'verified' => $user->verified,
                        'slug_name' => $user->slug_name
                    ]
            ]);
    }
    public function refresh()
    {   
            return response([
                'status' => 'success'
            ]);
    }
    public function logout()
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        session(['user_logged_out' => true]);
        JWTAuth::invalidate();
        return redirect('#/');
        
    }

    public function resendEmail(Request $request){

        $user = User::find(Auth::user()->id);
        event(new Registered($user));
        UserVerification::generate($user);
        UserVerification::send($user, 'Reminder - Activate email');
        return response([
            'status' => 'success'
        ]);
        
    }

    public function redirectToProvider()
    {          
        return response()->json([
            'redirectUrl' => Socialite::driver('facebook')->stateless()->redirect()->getTargetUrl()
        ]);
    }
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('email', $userSocial->email)->first();
        
        if ($findUser){
            $findUser->access_token = str_random(60);
            $credentials = $findUser;
            $token = JWTAuth::fromUser($findUser);
            return redirect('/#/')->json(compact('token'));
            
            // ->withCookie(cookie('authentication',
            // json_encode([ 
            //     'api_token' => $token,
            //     'user_id' => $findUser->id,
            //     'status' => 'success'
            // ]), 8000, null, null, false, false))->header('Authorization', $token);

        }else {
        
            $user = new User;
            $user->name = $userSocial->name;
            $user->lastname = $userSocial->name;
            $user->slug_name =  str_slug( $userSocial->name.' '.rand(), '-');
            $user->email = $userSocial->email;
            $user->access_token = str_random(60);
            $user->password = bcrypt('12345');
            $user->save(); 

            $credentials = $user;

            if ( ! $token = JWTAuth::fromUser($credentials)) {
                throw new AuthorizationException;
            }
         
            return redirect('/#/')->withCookie(cookie('authentication',
                    json_encode([
                        'api_token' => $user->access_token,
                        'user_id' => $user->id
                    ]), 8000, null, null, false, false));
           
        }
    }


}
