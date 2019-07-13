<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\indirect_income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class IndirectIncomeController extends Controller
{
    public function index(){
        $items = indirect_income::all();

        return view('Finance.IndirectIncome.index', compact('items'));
    }

    public function store(){
        $data = Input::all();
        $results = indirect_income::create($data);
        if($results){
            return Redirect::back()->with('success', 'Income Successfully Added');
        }
        else{
            return Redirect::back()->with('error', 'Failed to Add Income');
        }
    }
    public function edit($id){
        $IndirectIncome=indirect_income::find($id);
        return view('Finance.IndirectIncome.edit', compact('IndirectIncome'));
    }

    public function update(){
        $data = Input::all();
        $IndirectIncome = indirect_income::find($data['IndirectIncome_id']);
        $IndirectIncome->update($data);
        return Redirect::back()->with('success', 'Income Updated Successfully');
    }
    public function destroy($id){
        $IndirectIncome = indirect_income::find($id);
        $IndirectIncome->delete();

        return Redirect::back()->with('success','Income Deleted Successfuly');
    }
}
