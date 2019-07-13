<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function  Nursery(){
        return view('Grades.Nursery');
    }
    public function  Std1(){
        return view('Grades.Standard1');
    }
    public function  Std2(){
        return view('Grades.Standard2');
    }
    public function  Std3(){
        return view('Grades.Standard3');
    }
    public function  Std4(){
        return view('Grades.Standard4');
    }
    public function  Std5(){
        return view('Grades.Standard5');
    }
    public function  Std6(){
        return view('Grades.Standard6');
    }
    public function  Std7(){
        return view('Grades.Standard7');
    }

}
