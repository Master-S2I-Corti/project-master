<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{

    public function index() {
       // $log=Personne::where('id', Auth::user()->getId())->first(); 
        $log = Auth::user();
        return view("profil",compact('log'));
    }
}