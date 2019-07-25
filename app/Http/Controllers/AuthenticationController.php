<?php

namespace App\Http\Controllers;

use App\Models\Grades\Nursery;
use App\Models\Grades\Std1;
use App\Models\Grades\Std2;
use App\Models\Grades\Std3;
use App\Models\Grades\Std4;
use App\Models\Grades\Std5;
use App\Models\Grades\Std6;
use App\Models\Grades\Std7;
use App\models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AuthenticationController extends Controller
{
    public function loginIndex()
    {
        $errorMsg = "";
        return view('Login', compact('errorMsg'));
    }

    public function Login()
    {

        $data = Input::all();
//        dd($data);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
//            dd(Auth::user()->first_name);
            return redirect()->action('AuthenticationController@homepage');
        } else {
            $errorMsg = "Wrong UserName or Password";
            return view('Login', compact('errorMsg'));
        }

    }

    public function homepage()
    {
        $current_year = date('Y');
        $nursery = count(Nursery::getStudents($current_year));
        $Std1 = count(Std1::getStudents($current_year));
        $Std2 = count(Std2::getStudents($current_year));
        $Std3 = count(Std3::getStudents($current_year));
        $Std4 = count(Std4::getStudents($current_year));
        $Std5 = count(Std5::getStudents($current_year));
        $Std6 = count(Std6::getStudents($current_year));
        $Std7 = count(Std7::getStudents($current_year));
        $totalStudents = count(Student::all());
        return view('Dashboard.Dashboard', compact('nursery', 'Std1', 'Std2', 'Std3', 'Std4', 'Std5', 'Std6', 'Std7', 'totalStudents'));
    }

}
