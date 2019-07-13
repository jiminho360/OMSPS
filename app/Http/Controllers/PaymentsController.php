<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\models\StudentPaymentRecord;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index(){
        $payments = StudentPaymentRecord::all();
        $students = Student::all();

        return view('Payment.index', compact('payments','students'));
    }
}


