<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\UserType;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function Index()
    {
        $Employees = Employee::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $user_types = UserType::all();
        return view('Employees.index', compact('Employees', 'religions', 'nationalities', 'user_types'));
    }

    public function store()
    {
        $data = Input::all();
        $data['profile_picture'] = '0000/00001';
        $data['year_id'] = Year::where('status', 1)->first()->id;
        $results = Employee::create($data);

        if ($results) {
            return Redirect::back()->with('success', 'Employee Successfully Created');
        } else {
            return Redirect::back()->with('error', 'Failed to create Employee');
        }

    }

    public function edit($id)
    {
        $Employee = Employee::find($id);
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $user_types = UserType::all();
        return view('Employees.edit', compact('Employee', 'religions', 'nationalities', 'user_types'));

    }
    public function show($id)
    {
        $Employee = Employee::find($id);
        return view('Employees.show', compact('Employee'));
    }


    public function update()
    {
        $data = Input::all();

        $Employee = Employee::find($data['employee_id']);

        $employee_exist = Employee::where('Email', $data['email'])->where('id', '!=', $data['employee_id'])->first();

        if (!$employee_exist) {

            $Employee->update($data);

            return Redirect::back()->with('success', 'Employee Successfully Updated');

        } else {
            return Redirect::back()->with('errors', 'Employee with this Email Already Exist');
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return Redirect::back()->with('success', 'Employee Successfully Deleted');
    }


}


