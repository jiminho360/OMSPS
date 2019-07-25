<?php

namespace App\Http\Controllers\Reports\Grades;

use App\Models\Grades\Nursery;
use App\models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class NurseryController extends Controller
{
    public function index()
    {
        $items = Nursery::getReport();
        $current_year = date('Y');
        $students = Nursery::getStudents($current_year);

        return view('Reports.Grades.Nursery.index', compact('items', 'students'));
    }


    public function downloadPdf(Request $request)
    {

        $results = Nursery::where('student_id',$request->student_id)->first();


        $student = Student::find($request->student_id);

        $positions = Nursery::getReport();

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

        $varDet = "Nursery Report";

        $pdf = PDF::loadView('Reports.Grades.Nursery.report', compact('results', 'student','studentPosition'));
        return $pdf->download($varDet . '.pdf');
    }
}
