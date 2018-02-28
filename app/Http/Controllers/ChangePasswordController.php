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
        
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Le mot de passe entré ne correspond pas à votre mot de passe actuel.");
        }
        
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Le nouveau mot de passe est identique à l'ancien. Veuillez choisir un autre.");
        }
        
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:6|confirmed',
            ]);
            //Change Password
            $personne = Auth::user();
            $personne->password = bcrypt($request->get('new-password'));
            $personne->save();
        
            return redirect()->back()->with("success","Mot de passe modifé !");
        }



}
