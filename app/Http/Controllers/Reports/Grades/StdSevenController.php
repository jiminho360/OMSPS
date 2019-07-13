<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std7;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdSevenController extends Controller
{
    public function index()
    {
        $items = Std7::getReport();

        return view('Reports.Grades.Std7.index',compact('items'));
    }
    public function downloadPdf()
    {

        PDF::setOptions(
            [
                'defaultPaperSize' => 'a4',
                'dpi' => 150,
                'defaultFont' => 'sans-serif',
                'isHtml5ParserEnabled' => true
            ]);

        $varDet = "Standard 7 Report";

        $pdf = PDF::loadView('Reports.Grades.Std7.report');
        return $pdf->download($varDet . '.pdf');
    }
}
