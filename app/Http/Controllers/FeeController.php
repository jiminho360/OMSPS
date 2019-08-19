<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class FeeController extends Controller
{
    public function index()
    {
        $Fees = Fee::all();
        return view('Fees.index', compact('Fees'));
    }

    public function edit($id)
    {
        $Fee = Fee::find($id);

        return view('Fees.edit', compact('Fee'));
    }

    public function store()
    {
        $data = Input::all();
        $results = Fee::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Fee Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to add Fee');
        }

    }

    public function update()
    {
        $data = Input::all();

        $Fee = Fee::find($data['Fee_id']);

        $result = $Fee->update($data);

        if ($result) {
            return Redirect::back()->with('success', 'Fee Successfully Updated');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function destroy($id)
    {
        $Fee = Fee::find($id);
        $Fee->delete();

        return Redirect::back()->with('success', 'Fee Successfully Deleted');
    }


//    public function activate($id)
//    {
//        //Deactivating Current Year
//        $currentFee  = Fee::where('status',1)->first();
//        $currentFee->status = 0;
//        $currentFee->update();
//
//        //Activating Year
//        $Fee = Fee::find($id);
//        $Fee->status = 1;
//        $Fee->update();
//
//        return Redirect::back()->with('success',$Fee->name.' Successfully Activated');
//    }
}
