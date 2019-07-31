<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std6;
use App\models\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdSixController extends Controller
{
    public function index()
    {
        $items = Std6::getReport();
        $current_year = date('Y');
        $students = Std6::getStudents($current_year);
        return view('Reports.Grades.Std6.index',compact('items','students'));
    }
    public function downloadPdf(Request $request)
    {

        $results = Std6::where('student_id',$request->student_id)->first();
        $student = Student::find($request->student_id);
        $positions = Std6::getReport();

        $studentPosition = 0;

        foreach ($positions as $key=>$position) {
            if($position->student_id == $request->student_id){
                $studentPosition = $key+1;
            }
        }
        PDF::setOptions(
            [
                'defaultPaperSize' => 'a4',
                'dpi' => 150,
                'defaultFont' => 'sans-serif',
                'isHtml5ParserEnabled' => true
            ]);

        $varDet = "Standard 6 Report";

        $pdf = PDF::loadView('Reports.Grades.Std6.report',compact('results','student','studentPosition'));
        return $pdf->download($varDet . '.pdf');
    }
}
