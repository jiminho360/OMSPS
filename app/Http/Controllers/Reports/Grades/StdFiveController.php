<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std5;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdFiveController extends Controller
{
    public function index()
    {
        $items = Std5::getReport();

        return view('Reports.Grades.Std5.index',compact('items'));
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

        $varDet = "Standard 5 Report";

        $pdf = PDF::loadView('Reports.Grades.Std5.report');
        return $pdf->download($varDet . '.pdf');
    }
}
