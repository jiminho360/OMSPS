<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\inventories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class InventoriesController extends Controller
{
    public function index(){
        $items = inventories::all();

        return view('Finance.Inventories.index', compact('items'));
    }

    public function store(){
        $data = Input::all();
        $results = inventories::create($data);
        if($results){
            return Redirect::back()->with('success', 'Inventory Successfully Added');
        }
        else{
            return Redirect::back()->with('error', 'Failed to Add Inventory');
        }

    }
    public function edit($id){
        $Inventory=inventories::find($id);
        return view('Finance.Inventories.edit', compact('Inventory'));
    }

    public function update(){
        $data = Input::all();
        $Inventory = inventories::find($data['Inventory_id']);
        $Inventory->update($data);
        return Redirect::back()->with('success', 'Inventory Updated Successfully');
    }
    public function destroy($id){
        $Inventory = inventories::find($id);
        $Inventory->delete();

        return Redirect::back()->with('success','Inventory Deleted Successfuly');
    }
}
