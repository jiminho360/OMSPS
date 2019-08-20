<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserTypesController extends Controller
{
    public function index()
    {
        $user_types = UserType::all();

        return view('UserTypes.index', compact('user_types'));
    }
public function store(){
        $data = Input::all();
        $results = UserType::create($data);
        if($results){
            return Redirect::back()->with('success','UserType Added Successfully');
        }
        else{
            return Redirect::back()->with('error','UserType Failed to be added');
        }

}
    public function edit($id)
    {
        $UserType = UserType::find($id);

        return view('UserTypes.edit', compact('UserType'));
    }

public function destroy($id){
        $UserType = UserType::find($id);
        $UserType->delete();

        return Redirect::back()->with('success','Deleted Successfully');
}
}
