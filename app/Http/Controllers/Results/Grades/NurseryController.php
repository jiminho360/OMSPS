<?php

namespace App\Http\Controllers\Results\Grades;

use App\Models\Grades\Nursery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NurseryController extends Controller
{
    public function index()
    {
        $items = Nursery::getReport();

        return view('Results.Grades.Nursery.index',compact('items'));
    }
}
