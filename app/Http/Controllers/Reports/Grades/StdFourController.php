<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std4;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdFourController extends Controller
{
    public function index()
    {
        $items = Std4::getReport();

        return view('Reports.Grades.Std4.index',compact('items'));
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

        $varDet = "Standard 4 Report";

        $pdf = PDF::loadView('Reports.Grades.Std4.report');
        return $pdf->download($varDet . '.pdf');
    }
}
