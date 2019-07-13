<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NationalitiesController extends Controller
{
    public function index(){
        $nationalities = Nationality::all();

        return view('nationalities.index', compact( 'nationalities'));
    }
    public function update()
    {
        $data = Input::all();

        $nationality = Nationality::find($data['nationality_id']);

        $result = $nationality->update($data);

        if ($result) {
            return Redirect::back()->with('success', 'Nationality Successfully Updated');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function store()
    {
        $data = Input::all();
        $result = Nationality::create($data);

        if ($result) {
            return Redirect::back()->with('success', 'Nationality Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function edit($id)
    {
        $nationality = Nationality::find($id);

        return view('nationalities.edit', compact('nationality'));
    }

    public function destroy($id)
    {
        $nationality = Nationality::find($id);
        $nationality->delete();

        return Redirect::back()->with('success','Successfully Deleted');
    }

}
