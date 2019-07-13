<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ReligionsController extends Controller
{
    public function index()
    {
        $religions = Religion::all();

        return view('Religions.index', compact('religions'));
    }

    public function store()
    {
        $data = Input::all();
        $result = Religion::create($data);

        if ($result) {
            return Redirect::back()->with('success', 'Religion Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function edit($id)
    {
        $religion = Religion::find($id);

        return view('Religions.edit', compact('religion'));
    }

    public function update()
    {
        $data = Input::all();

        $religion = Religion::find($data['religion_id']);

        $result = $religion->update($data);

        if ($result) {
            return Redirect::back()->with('success', 'Religion Successfully Updated');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function destroy($id)
    {
        $religion = Religion::find($id);
        $religion->delete();

        return Redirect::back()->with('success', 'Successfully Deleted');
    }


}
