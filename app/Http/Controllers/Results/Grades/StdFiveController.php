<?php

namespace App\Http\Controllers\Results\Grades;

use App\Models\Grades\Std5;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdFiveController extends Controller
{
    public function index()
    {
        $items = Std5::getReport();

        return view('Results.Grades.Std5.index',compact('items'));
    }
}
