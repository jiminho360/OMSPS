<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std3;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdThreeController extends Controller
{
    public function index()
    {
        $items = Std3::getReport();

        return view('Reports.Grades.Std3.index',compact('items'));
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

        $varDet = "Standard 3 Report";

        $pdf = PDF::loadView('Reports.Grades.Std3.report');
        return $pdf->download($varDet . '.pdf');
    }
}
