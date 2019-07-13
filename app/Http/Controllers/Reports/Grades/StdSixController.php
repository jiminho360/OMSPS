<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std6;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdSixController extends Controller
{
    public function index()
    {
        $items = Std6::getReport();

        return view('Reports.Grades.Std6.index',compact('items'));
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

        $varDet = "Standard 6 Report";

        $pdf = PDF::loadView('Reports.Grades.Std6.report');
        return $pdf->download($varDet . '.pdf');
    }
}
