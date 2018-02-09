<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Personne;
use DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    protected $redirectTo = '/';
    
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    
    
    protected function validateEmail(Request $request)
    {

        $this->validate($request, ['email' => 'required|email']);
        $this->validate($request, ['email_sos' => 'required|email']);
        
    }
    
    
    public function validates($data){
     //   Personne::where('email', '=', email).and('email_sos', '=', email_sos).get();
    }
    
}
