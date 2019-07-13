<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance\Carriages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CarriagesController extends Controller
{
    public function index(){
        $items =  Carriages::all();

        return view('Finance.Carriages.index', compact('items'));
    }

    public function store()
    {
        $data = Input::all();
        $results = Carriages::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Carriage Successfully Added');
        } else {
            return Redirect::back()->with('error', 'Failed to add Carriage');
        }

    }
    public function edit($id)
    {
        $Carriage = Carriages::find($id);
        return view('Finance.Carriages.edit', compact('Carriage'));

    }

    public function update()
    {
        $data = Input::all();

        $Carriage = Carriages::find($data['carriage_id']);
            $Carriage->update($data);

            return Redirect::back()->with('success', 'Carriage Successfully Updated');

    }
    public function destroy($id)
    {
        $Carriage = Carriages::find($id);
        $Carriage->delete();

        return Redirect::back()->with('success','Carriage Successfully Deleted');
    }

}
