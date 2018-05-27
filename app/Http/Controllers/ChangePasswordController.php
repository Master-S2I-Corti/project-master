<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ChangePasswordController extends Controller {

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
    
    public function changePassword(Request $request){
        
            
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:12|regex:/^.*(?=.{4,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?,;.:!§@#$%^&+-]).*$/',
                'new-password-confirm' => 'required|same:new-password',
            ], [
                'current-password.required' => 'Veuillez entrer votre mot de passe actuel',
                'new-password.required' => 'Veuillez entrer un nouveau mot de passe',
                'new-password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule,un chiffre et un caractère spécial.',
                'new-password.required' => 'Veuillez confirmer votre mot de passe',
                'new-password.min' => 'Le mot de passe doit contenir au moins 12 caractères avec une majuscule, une minuscule,un chiffre et un caractère spécial.',
                'new-password-confirm.required' => 'Veuillez confirmer votre mot de passe',
                'new-password-confirm.same' => 'Les deux mots de passes entrés ne sont pas identiques, veuillez réessayer.'
            ]);
        
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("current-password","Le mot de passe entré ne correspond pas à votre mot de passe actuel.");
            
        }
        
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("new-password-confirm","Le nouveau mot de passe est identique à l'ancien. Veuillez choisir un autre.");
        }
        
            
        
            //Change Password
            $personne = Auth::user();
            $personne->password = bcrypt($request->get('new-password'), ['rounds' => 12]);
            
            if (Hash::needsRehash($personne->password)) {
                $personne->password = bcrypt($request->get('new-password'), ['rounds' => 12]);
            }
        
            $personne->save();
        
            return redirect()->back()->with("success","Mot de passe modifé !");
        }
    




}
