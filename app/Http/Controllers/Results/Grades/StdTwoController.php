<?php

namespace App\Http\Controllers\Results\Grades;

use App\Models\Grades\Std2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdTwoController extends Controller
{
    public function index()
    {
        $items = Std2::getReport();

        return view('Results.Grades.Std2.index',compact('items'));
    }
}
