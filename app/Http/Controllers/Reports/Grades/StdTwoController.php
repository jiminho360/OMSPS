<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std2;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdTwoController extends Controller
{
    public function index()
    {
        $items = Std2::getReport();

        return view('Reports.Grades.Std2.index',compact('items'));
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

        $varDet = "Standard 2 Report";

        $pdf = PDF::loadView('Reports.Grades.Std2.report');
        return $pdf->download($varDet . '.pdf');
    }
}
