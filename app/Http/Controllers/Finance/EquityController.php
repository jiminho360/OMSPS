<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\equity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EquityController extends Controller
{
    public function index(){
        $items = equity::all();

        return view('Finance.Equity.index', compact('items'));
    }
    public function store()
    {
        $data = Input::all();
        $results = equity::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Equity Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to add Equity');
        }

    }
    public function edit($id){
        $Equity=equity::find($id);
        return view('Finance.Equity.edit', compact('Equity'));
    }

    public function update(){
        $data = Input::all();
        $Equity = equity::find($data['Equity_id']);
        $Equity->update($data);
        return Redirect::back()->with('success', 'Equity Updated Successfully');
    }
    public function destroy($id){
        $Equity = equity::find($id);
        $Equity->delete();

        return Redirect::back()->with('success','Equity Deleted Successfuly');
    }
}
