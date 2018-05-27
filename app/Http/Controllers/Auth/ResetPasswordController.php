<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;



class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password, ['rounds' => 12]);
        
        if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($password, ['rounds' => 12]);
        }
        
        $user->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
        
    }
    
        public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

                
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($response)
                    : $this->sendResetFailedResponse($request, $response);
    }
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email|exists:Personne',
            'password' => 'required|string|min:12|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?,;.:!§@#$%^&+-]).*$/',
            'password_confirmation' => 'required|same:password',
        ];
    }
    
    protected function validationErrorMessages()
    {
        return ['email.email' => 'Le champ email doit contenir une adresse mail valide.',
                'email.required' => 'Le champ email est obligatoire',
                'email.exists' => "Votre email est incorrect.",
                'password.required' => 'Le champ mot de passe est obligatoire.',
                'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule,un chiffre et un caractère spécial.',
                'password.min' => 'Le mot de passe doit contenir au moins 12 caractères avec une majuscule, une minuscule,un chiffre et un caractère spécial.',
                'password_confirmation.required' => 'Le champ de confirmation du mot de passe est obligatoire.',
                'password_confirmation.same' => 'Les deux mots de passes entrés ne sont pas identiques, veuillez réessayer.',
               ];
        
    }
    

    
    
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    
    
}
