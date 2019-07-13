<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StudentsController extends Controller
{

    public function index()
    {
        $students = Student::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();


        return view('Students.index', compact('students', 'religions', 'nationalities'));
    }

    public function store()
    {
        $data = Input::all();
        $data['profile_picture'] = '0000/00001';
        $data['year_id'] = Year::where('status', 1)->first()->id;
        $result = Student::create($data);

        if ($result) {
            return Redirect::back()->with('success', 'Student Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $religions = Religion::all();
        $nationalities = Nationality::all();
        return view('Students.edit', compact('student', 'religions', 'nationalities'));
    }

    public function update()
    {
        $data = Input::all();

        $student = Student::find($data['student_id']);

        $result = $student->update($data);

        if ($result) {
            return Redirect::back()->with('success', 'Student Successfully Updated');
        } else {
            return Redirect::back()->with('errors', 'Sorry An Error Occurred');
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return Redirect::back()->with('success', 'Successfully Deleted');
    }

}
