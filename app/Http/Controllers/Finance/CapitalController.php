<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\capital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CapitalController extends Controller
{
    public function index(){
        $items = capital::all();

        return view('Finance.Capital.index', compact('items'));
    }
    public function store()
    {
        $data = Input::all();
        $results = capital::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Capital Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to add Capital');
        }

    }
    public function edit($id){
        $Capital=capital::find($id);
        return view('Finance.Capital.edit', compact('Capital'));
    }

    public function update(){
        $data = Input::all();
        $Capital = capital::find($data['Capital_id']);
        $Capital->update($data);
        return Redirect::back()->with('success', 'Capital Updated Successfully');
    }
    public function destroy($id){
        $Capital = capital::find($id);
        $Capital->delete();

        return Redirect::back()->with('success','Capital Deleted Successfuly');
    }
}
