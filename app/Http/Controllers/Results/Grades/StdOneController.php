<?php

namespace App\Http\Controllers\Results\Grades;
use App\Models\Grades\Std1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdOneController extends Controller
{
    public function index()
    {
        $items = Std1::getReport();

        return view('Results.Grades.Std1.index',compact('items'));
    }
}
