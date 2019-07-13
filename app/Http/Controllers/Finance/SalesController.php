<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SalesController extends Controller
{
    public function index()
    {
        $items = sales::all();

        return view('Finance.Sales.index', compact('items'));
    }

    public function store()
    {
        $data = Input::all();
        $results = sales::create($data);
        if ($results) {
            return Redirect::back()->with('success', 'Sales Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to Add Sales');
        }

    }
    public function edit($id){
        $Sale=sales::find($id);
        return view('Finance.Sales.edit', compact('Sale'));
    }

    public function update(){
        $data = Input::all();
        $Sale = sales::find($data['Sale_id']);
        $Sale->update($data);
        return Redirect::back()->with('success', 'Sale Updated Successfully');
    }
    public function destroy($id){
        $Sale = sales::find($id);
        $Sale->delete();

        return Redirect::back()->with('success','Sale Deleted Successfuly');
    }
}
