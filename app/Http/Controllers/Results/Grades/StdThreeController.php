<?php

namespace App\Http\Controllers\Results\Grades;

use App\Models\Grades\Std3;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdThreeController extends Controller
{
    public function index()
    {
        $items = Std3::getReport();

        return view('Results.Grades.Std3.index',compact('items'));
    }
}
