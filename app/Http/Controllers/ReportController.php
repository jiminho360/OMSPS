<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function Academic(){

        return view('Results.Academic');
    }
    public function Financial(){

        return view('Results.Financial');
    }
}
