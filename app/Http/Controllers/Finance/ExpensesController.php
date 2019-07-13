<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\expenses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ExpensesController extends Controller
{
    public function index(){
        $items = expenses::all();

        return view('Finance.Expenses.index', compact('items'));
    }

    public function store(){
        $data = Input::all();
        $results = expenses::create($data);

        if($results){
            return Redirect::back()->with('success', 'Expense Successfuly added');
        }
        else{
            return Redirect::back()->with('error', 'Failed to add Expense');
        }

    }
    public function edit($id){
        $Expense=expenses::find($id);
        return view('Finance.Expenses.edit', compact('Expense'));
    }

    public function update(){
        $data = Input::all();
        $Expense = expenses::find($data['Expense_id']);
        $Expense->update($data);
        return Redirect::back()->with('success', 'Expense Updated Successfully');
    }
    public function destroy($id){
        $Expense = expenses::find($id);
        $Expense->delete();

        return Redirect::back()->with('success','Expense Deleted Successfuly');
    }
}
