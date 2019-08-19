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
    public function edit($id)
    {
        $Payment = StudentPaymentRecord::find($id);
        $students = Student::all();
//        dd($Payment->people->first_name);
        return view('Payment.edit', compact('Payment','students'));

    }

    public function update()
    {
        $data = Input::all();

        $Payment = StudentPaymentRecord::find($data['Payment_id']);
        $Payment->update($data);

        return Redirect::back()->with('success', 'Payment Successfully Updated');

    }
    public function destroy($id)
    {
        $Payment = StudentPaymentRecord::find($id);
        $Payment->delete();

        return Redirect::back()->with('success','Payment Successfully Deleted');
    }
}


