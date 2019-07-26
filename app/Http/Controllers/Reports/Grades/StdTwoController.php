<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Std2;
use App\models\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdTwoController extends Controller
{
    public function index()
    {
        $items = Std2::getReport();
        $current_year = date('Y');
        $students = Std2::getStudents($current_year);
        return view('Reports.Grades.Std2.index',compact('items','students'));
    }
    public function downloadPdf(Request $request)
    {

        $results = Std2::where('student_id',$request->student_id)->first();
        $student = Student::find($request->student_id);

//        dd($student);

        $positions = Std2::getReport();



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

        $varDet = "Standard 2 Report";

        $pdf = PDF::loadView('Reports.Grades.Std2.report', compact('results', 'student','studentPosition'));
        return $pdf->download($varDet . '.pdf');
    }
}
