<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades\Std7;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StdSevenController extends Controller
{
    public function index()
    {
        $items = Std7::all();
        $current_year = date('Y');
        $students = Std7::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'english', 'text' => 'English'], ['value' => 'kiswahili', 'text' => 'Kiswahili'], ['value' => 'science', 'text' => 'Science'],
            ['value' => 'ICT', 'text' => 'ICT'], ['value' => 'PDS', 'text' => 'PDS'], ['value' => 'History', 'text' => 'History'], ['value' => 'Geography', 'text' => 'Geography'], ['value' => 'Civics', 'text' => 'Civics'],
            ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];
//        dd($students);

        return view('Grades.Std7.index', compact('items', 'students', 'lesson', 'term'));
    }

    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status', 1)->first()->id;

        $test = Std7::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();

        if ($test) {
            $StdSeven = Std7::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();
            $StdSeven->$inputVal = $data['marks'];
            $StdSeven->update();
        } else {
            $StdSeven = new Std7;
            $StdSeven->$inputVal = $data['marks'];
            $StdSeven->student_id = $data['student_id'];
            $StdSeven->term = $data['term'];
            $StdSeven->year_id = Year::where('status', 1)->first()->id;
            $StdSeven->save();
        }

        return Redirect::back()->with('success', 'Successfully Added a Mark');
    }

    public function edit($id)
    {

        $item = Std7::find($id);
        $current_year = date('Y');
        $students = Std7::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'english', 'text' => 'English'], ['value' => 'kiswahili', 'text' => 'Kiswahili'], ['value' => 'science', 'text' => 'Science'],
            ['value' => 'ICT', 'text' => 'ICT'], ['value' => 'PDS', 'text' => 'PDS'], ['value' => 'History', 'text' => 'History'], ['value' => 'Geography', 'text' => 'Geography'], ['value' => 'Civics', 'text' => 'Civics'],
            ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];


        return view('Grades.Std7.edit', compact('item', 'students', 'lesson', 'term'));
    }

    public function show($id)
    {
        $item = Std7::find($id);
        return view('Grades.Std7.show', compact('item'));
    }

    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Std7::find($data['Std7_id']);

        $item_exist = Std7::where('student_id', $data['student_id'])->where('id', '!=', $data['Std7_id'])->first();

        if (!$item_exist) {

            $item->$inputVal = $data['marks'];
            $item->student_id = $data['student_id'];
            $item->term = $data['term'];

            $item->update();

            return Redirect::back()->with('success', 'Data Successfully Updated');

        } else {
            return Redirect::back()->with('errors', 'Duplicate Records');
        }
    }

    public function getMarks(Request $request)
    {

        $mark = Std7::where('id', $request->d_Std7)->pluck($request->d_lesson);

        return json_encode($mark);
    }

}
