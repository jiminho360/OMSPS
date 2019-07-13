<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades\Std6;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StdSixController extends Controller
{
    public function index()
    {
        $items = Std6::all();
        $current_year = date('Y');
        $students = Std6::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'english', 'text' => 'English'], ['value' => 'kiswahili', 'text' => 'Kiswahili'], ['value' => 'science', 'text' => 'Science'],
            ['value' => 'ICT', 'text' => 'ICT'], ['value' => 'PDS', 'text' => 'PDS'], ['value' => 'History', 'text' => 'History'], ['value' => 'Geography', 'text' => 'Geography'], ['value' => 'Civics', 'text' => 'Civics'],
            ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];
//        dd($students);

        return view('Grades.Std6.index', compact('items', 'students', 'lesson', 'term'));
    }

    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status', 1)->first()->id;

        $test = Std6::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();

        if ($test) {
            $StdSix = Std6::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();
            $StdSix->$inputVal = $data['marks'];
            $StdSix->update();
        } else {
            $StdSix = new Std6;
            $StdSix->$inputVal = $data['marks'];
            $StdSix->student_id = $data['student_id'];
            $StdSix->term = $data['term'];
            $StdSix->year_id = Year::where('status', 1)->first()->id;
            $StdSix->save();
        }

        return Redirect::back()->with('success', 'Successfully Added a Mark');
    }

    public function edit($id)
    {

        $item = Std6::find($id);
        $current_year = date('Y');
        $students = Std6::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'english', 'text' => 'English'], ['value' => 'kiswahili', 'text' => 'Kiswahili'], ['value' => 'science', 'text' => 'Science'],
            ['value' => 'ICT', 'text' => 'ICT'], ['value' => 'PDS', 'text' => 'PDS'], ['value' => 'History', 'text' => 'History'], ['value' => 'Geography', 'text' => 'Geography'], ['value' => 'Civics', 'text' => 'Civics'],
            ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];


        return view('Grades.Std6.edit', compact('item', 'students', 'lesson', 'term'));
    }

    public function show($id)
    {
        $item = Std6::find($id);
        return view('Grades.Std6.show', compact('item'));
    }


    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Std6::find($data['Std6_id']);

        $item_exist = Std6::where('student_id', $data['student_id'])->where('id', '!=', $data['Std6_id'])->first();

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

        $mark = Std6::where('id', $request->d_Std6)->pluck($request->d_lesson);

        return json_encode($mark);
    }

}
