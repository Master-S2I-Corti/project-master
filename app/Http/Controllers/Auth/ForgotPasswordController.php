<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\Personne;

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
    
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only(['email_sos', 'email'])
        );

        
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }
    
    
    protected function validateEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:personne',
            'email_sos' => 'required|email|exists:personne',
        ], [
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse mail valide.',
            'email.exists' => "Votre email est incorrect.",
            'email_sos.required' => 'Le champ email de secours est obligatoire.',
            'email_sos.email' => 'Veuillez entrer une adresse mail valide',
            'email_sos.exists' => 'Votre email de secours est incorrect.',
        ]);
            
    }
    
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email_sos' => trans($response)]
        );
    }
     
        
    
    
    
}
