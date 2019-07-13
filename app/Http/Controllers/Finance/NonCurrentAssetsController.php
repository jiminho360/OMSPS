<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\non_current_assets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NonCurrentAssetsController extends Controller
{
    public function index(){
        $items = non_current_assets::all();

        return view('Finance.NonCurrentAssets.index', compact('items'));
    }
    public function store(){
        $data = Input::all();
        $results = non_current_assets::create($data);
        if($results){
            return Redirect::back()->with('success', 'Asset Successfully Added');
        }
        else{
            return Redirect::back()->with('error', 'Failed to Add Asset');
        }

    }

    public function edit($id){
        $NonCurrentAsset=non_current_assets::find($id);
        return view('Finance.NonCurrentAssets.edit', compact('NonCurrentAsset'));
    }

    public function update(){
        $data = Input::all();
        $NonCurrentAsset = non_current_assets::find($data['NonCurrentAsset_id']);
        $NonCurrentAsset->update($data);
        return Redirect::back()->with('success', 'Asset Updated Successfully');
    }
    public function destroy($id){
        $NonCurrentAsset = non_current_assets::find($id);
        $NonCurrentAsset->delete();

        return Redirect::back()->with('success','Asset Deleted Successfuly');
    }
}
