<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function teacher(){
        return view('Teacher.teacher');

    }
}
