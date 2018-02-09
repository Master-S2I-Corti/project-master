<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enseignant;


class ProfilController extends Controller
{

    public function index() {
       // $log=Personne::where('id', Auth::user()->getId())->first(); 
        $log = Auth::user();
        $enseignant = Enseignant::where('id',$log['id'])->first();
        return view("profil",compact('log','enseignant'));
    }
}