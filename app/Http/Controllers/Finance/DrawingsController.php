<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\drawing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class DrawingsController extends Controller
{
    public function index(){
        $items = drawing::all();

        return view('Finance.Drawings.index', compact('items'));
    }
    public function store()
    {
        $data = Input::all();
        $results = drawing::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Drawing Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to add Drawing');
        }

    }
    public function edit($id){
        $Drawing=drawing::find($id);
        return view('Finance.Drawings.edit', compact('Drawing'));
    }

    public function update(){
        $data = Input::all();
        $Drawing = drawing::find($data['Drawing_id']);
        $Drawing->update($data);
        return Redirect::back()->with('success', 'Drawing Updated Successfully');
    }
    public function destroy($id){
        $Drawing = drawing::find($id);
        $Drawing->delete();

        return Redirect::back()->with('success','Drawing Deleted Successfuly');
    }
}
