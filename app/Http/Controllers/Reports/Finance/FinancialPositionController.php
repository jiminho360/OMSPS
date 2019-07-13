<?php

namespace App\Http\Controllers\Reports\Finance;

use Barryvdh\DomPDF\facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinancialPositionController extends Controller{
    public function index()
    {
//        $items = Nursery::getReport();
//        $current_year = date('Y');
//        $students = Student::getStudents($current_year);

        return view('Reports.Financial.FinancialPosition.index');
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

        $varDet = "Financial Position Report";

        $pdf = PDF::loadView('Reports.Financial.FinancialPosition.report');
        return $pdf->download($varDet . '.pdf');
    }

}
