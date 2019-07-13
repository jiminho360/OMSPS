<?php

namespace App\Http\Controllers\Results\Grades;

use App\Models\Grades\Std4;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdFourController extends Controller
{
    public function index()
    {
        $items = Std4::getReport();

        return view('Results.Grades.Std4.index',compact('items'));
    }
}
