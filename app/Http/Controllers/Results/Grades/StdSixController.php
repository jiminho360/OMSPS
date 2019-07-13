<?php

namespace App\Http\Controllers\Results\Grades;

use App\Models\Grades\Std6;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdSixController extends Controller
{
    public function index()
    {
        $items = Std6::getReport();

        return view('Results.Grades.Std6.index',compact('items'));
    }
}
