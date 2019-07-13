<?php

namespace App\Http\Controllers\Results\Grades;
use App\Models\Grades\Std7;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdSevenController extends Controller
{
    public function index()
    {
        $items = Std7::getReport();

        return view('Results.Grades.Std7.index',compact('items'));
    }
}
