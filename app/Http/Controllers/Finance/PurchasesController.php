<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\Purchase;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PurchasesController extends Controller
{
    public function index()
    {
        $items = Purchase::all();

        return view('Finance.Purchases.index', compact('items'));
    }

    public function store()
    {
        $data = Input::all();
        $data['year_id'] = Year::where('status', 1)->first()->id;
        $results = Purchase::create($data);
        if ($results) {
            return Redirect::back()->with('success', 'Purchases Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Purchases to Add Sales');
        }

    }
    public function edit($id){
        $Purchase=Purchase::find($id);
        return view('Finance.Purchases.edit', compact('Purchase'));
    }

    public function update(){
        $data = Input::all();
        $Purchase = Purchase::find($data['Purchase_id']);
        $Purchase->update($data);
        return Redirect::back()->with('success', 'Purchases Updated Successfully');
    }
    public function destroy($id){
        $Purchase = Purchase::find($id);
        $Purchase->delete();

        return Redirect::back()->with('success','Purchases Deleted Successfuly');
    }
}
