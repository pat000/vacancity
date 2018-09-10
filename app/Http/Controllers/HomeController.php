<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function resendEmail(){
      
        $user = JWTAuth::user();
        event(new Registered($user));
        UserVerification::generate($user);
        UserVerification::send($user, 'Vacancity - Email Verification');
        return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
    }
}
