<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades\Std2;
use App\models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StdTwoController extends Controller
{
    public function index()
    {
        $items = Std2::all();
        $current_year = date('Y');
        $students = Std2::getStudents($current_year);
        $lesson = [['value' => 'Mathematics', 'text' => 'Mathematics'], ['value' => 'Reading', 'text' => 'Reading'],['value' => 'Writing', 'text' => 'Writing'], ['value' => 'Science', 'text' => 'Science']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];

        return view('Grades.Std2.index', compact('items', 'students', 'lesson', 'term'));
    }

    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status', 1)->first()->id;

        $test = Std2::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();

        if ($test) {
            $StdTwo = Std2::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();
            $StdTwo->$inputVal = $data['marks'];
            $StdTwo->update();
        } else {
            $StdTwo = new Std2;
            $StdTwo->$inputVal = $data['marks'];
            $StdTwo->student_id = $data['student_id'];
            $StdTwo->term = $data['term'];
            $StdTwo->year_id = Year::where('status', 1)->first()->id;
            $StdTwo->save();
        }

        return Redirect::back()->with('success', 'Successfully Added a Mark');
    }

    public function edit($id)
    {

        $item = Std2::find($id);
        $current_year = date('Y');
        $students = Std2::getStudents($current_year);
        $lesson = [['value' => 'Mathematics', 'text' => 'Mathematics'], ['value' => 'Reading', 'text' => 'Reading'],['value' => 'Writing', 'text' => 'Writing'], ['value' => 'Science', 'text' => 'Science']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];


        return view('Grades.Std2.edit', compact('item', 'students', 'lesson', 'term'));
    }

    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Std2::find($data['Std2_id']);

        $item_exist = Std2::where('student_id', $data['student_id'])->where('id', '!=', $data['Std2_id'])->first();

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

    public function getMarks(Request $request){

        $mark = Std2::where('id',$request->d_Std2)->pluck($request->d_lesson);

        return json_encode($mark);
    }


}
