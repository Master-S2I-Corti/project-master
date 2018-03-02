<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller {

    public function index() {
        return view('notes');
    }


}
