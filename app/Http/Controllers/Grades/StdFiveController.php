<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\StudentsController;
use App\Models\Grades\Std5;
use App\Models\Grades\Std6;
use App\models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StdFiveController extends Controller
{
    public function index()
    {
        $items = Std5::all();
        $current_year = date('Y');
        $students = Std5::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'English', 'text' => 'English'], ['value' => 'Kiswahili', 'text' => 'Kiswahili'], ['value' => 'Science_and_Technology', 'text' => 'Science_and_Technology'], ['value' => 'Civics_and_Moral', 'text' => 'Civics_and_Moral'], ['value' => 'Social_Studies', 'text' => 'Social_Studies'], ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];
//        dd($students);

        return view('Grades.Std5.index', compact('items', 'students', 'term', 'lesson'));
    }

    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status', 1)->first()->id;

        $test = Std5::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();

        if ($test) {
            $StdFive = Std5::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();
            $StdFive->$inputVal = $data['marks'];
            $StdFive->update();
        } else {
            $StdFive = new Std5;
            $StdFive->$inputVal = $data['marks'];
            $StdFive->student_id = $data['student_id'];
            $StdFive->term = $data['term'];
            $StdFive->year_id = Year::where('status', 1)->first()->id;
            $StdFive->save();
        }

        return Redirect::back()->with('success', 'Successfully Added a Mark');
    }

    public function edit($id)
    {

        $item = Std5::find($id);
        $current_year = date('Y');
        $students = Std5::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'English', 'text' => 'English'], ['value' => 'Kiswahili', 'text' => 'Kiswahili'], ['value' => 'Science_and_Technology', 'text' => 'Science_and_Technology'], ['value' => 'Civics_and_Moral', 'text' => 'Civics_and_Moral'], ['value' => 'Social_Studies', 'text' => 'Social_Studies'], ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];


        return view('Grades.Std5.edit', compact('item', 'students', 'lesson', 'term'));
    }

    public function show($id)
    {
        $item = Std5::find($id);
        return view('Grades.Std4.show', compact('item'));
    }

    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Std5::find($data['Std5_id']);

        $item_exist = Std5::where('student_id', $data['student_id'])->where('id', '!=', $data['Std5_id'])->first();

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
    public function destroy($id)
    {
        $item = Std5::find($id);
        $item->delete();

        return Redirect::back()->with('success','Grades Successfully Deleted');
    }
    public function getMarks(Request $request)
    {

        $mark = Std5::where('id', $request->d_Std5)->pluck($request->d_lesson);

        return json_encode($mark);
    }
}
