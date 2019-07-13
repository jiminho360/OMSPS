<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use App\Models\Religion;
use App\Models\User;
use App\Models\UserType;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $user_types = UserType::all();

        return view('users.index', compact('users', 'religions', 'nationalities', 'user_types'));
    }

    public function store()
    {
        $data = Input::all();
        $data['password'] = Hash::make('12345');
        $data['profile_picture'] = '0000/00001';
        $data['year_id'] = Year::where('status', 1)->first()->id;
        $result = User::create($data);

        if ($result) {
            return Redirect::back()->with('success', 'User Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $user_types = UserType::all();

        return view('users.edit', compact('user', 'religions', 'nationalities', 'user_types'));
    }

    public function update()
    {
        $data = Input::all();

        $user = User::find($data['user_id']);

        $result = $user->update($data);

        if ($result) {
            return Redirect::back()->with('success', 'User Successfully Updated');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return Redirect::back()->with('success','Successfully Deleted');
    }

}
