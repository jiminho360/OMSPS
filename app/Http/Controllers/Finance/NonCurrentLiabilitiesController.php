<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\non_current_liabilities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NonCurrentLiabilitiesController extends Controller
{
    public function index(){
        $items = non_current_liabilities::all();

        return view('Finance.NonCurrentLiabilities.index', compact('items'));
    }
    public function store(){
        $data = Input::all();
        $results = non_current_liabilities::create($data);
        if($results){
            return Redirect::back()->with('success', 'Liability Successfully Added');
        }
        else{
            return Redirect::back()->with('error', 'Failed to Add Liability');
        }

    }
    public function edit($id){
        $NonCurrentLiability=non_current_liabilities::find($id);
        return view('Finance.NonCurrentLiabilities.edit', compact('NonCurrentLiability'));
    }

    public function update(){
        $data = Input::all();
        $NonCurrentLiability = non_current_liabilities::find($data['NonCurrentLiability_id']);
        $NonCurrentLiability->update($data);
        return Redirect::back()->with('success', 'Liability Updated Successfully');
    }
    public function destroy($id){
        $NonCurrentLiability = non_current_liabilities::find($id);
        $NonCurrentLiability->delete();

        return Redirect::back()->with('success','Liability Deleted Successfuly');
    }
}
