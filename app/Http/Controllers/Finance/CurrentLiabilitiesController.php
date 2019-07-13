<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\current_liabilities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CurrentLiabilitiesController extends Controller
{
    public function index(){
        $items = current_liabilities::all();

        return view('Finance.CurrentLiabilities.index', compact('items'));
    }
    public function store()
    {
        $data = Input::all();
        $results = current_liabilities::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Liability Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to add Liability');
        }

    }
    public function edit($id){
        $CurrentLiability=current_liabilities::find($id);
        return view('Finance.CurrentLiabilities.edit', compact('CurrentLiability'));
    }

    public function update(){
        $data = Input::all();
        $CurrentLiability = current_liabilities::find($data['CurrentLiability_id']);
        $CurrentLiability->update($data);
        return Redirect::back()->with('success', 'Liability Updated Successfully');
    }
    public function destroy($id){
        $CurrentLiability = current_liabilities::find($id);
        $CurrentLiability->delete();

        return Redirect::back()->with('success','Liability Deleted Successfuly');
    }
}
