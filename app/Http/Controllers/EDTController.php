<?php
namespace App\Http\Controllers;



class EDTController extends Controller
{

    protected $redirectTo = '/';

    public function index() {
        return view("emploi");
    }

}