<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\models\StudentPaymentRecord;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PaymentsController extends Controller
{
    public function index(){
        $payments = StudentPaymentRecord::all();
        $students = Student::all();
//dd($payments);
        return view('Payment.index', compact('payments','students'));
    }
    public function store(){
        $data = Input::all();
        $data['year_id'] = Year::where('status', 1)->first()->id;
        $results = StudentPaymentRecord::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Payment Successfully Created');
        } else {
            return Redirect::back()->with('error', 'Failed to create Payment');
        }

    }
}


