<?php

namespace App\Http\Controllers\Reports\Finance;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    public function index()
    {
//        $items = Nursery::getReport();
//        $current_year = date('Y');
//        $students = Student::getStudents($current_year);

        return view('Reports.Financial.IncomeStatement.index');
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

        $varDet = "Income Statement Report";

        $pdf = PDF::loadView('Reports.Financial.IncomeStatement.report');
        return $pdf->download($varDet . '.pdf');
    }
}
