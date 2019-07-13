<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\current_assets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CurrentAssetsController extends Controller
{
    public function index(){
        $items = current_assets::all();

        return view('Finance.CurrentAssets.index', compact('items'));
    }

    public function store()
    {
        $data = Input::all();
        $results = current_assets::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Asset Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to add Asset');
        }

    }
    public function edit($id)
    {
        $CurrentAsset = current_assets::find($id);

        return view('Finance.CurrentAssets.edit', compact('CurrentAsset'));
    }
    public function update()
    {
        $data = Input::all();

        $CurrentAsset = current_assets::find($data['CurrentAsset_id']);
        $CurrentAsset->update($data);

        return Redirect::back()->with('success', 'Asset Successfully Updated');

    }
    public function destroy($id){
        $CurrentAsset=current_assets::find($id);
        $CurrentAsset->delete();

        return Redirect::back()->with('success','Asset successfull deleted');

    }
}
