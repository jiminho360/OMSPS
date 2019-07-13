<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades\Std4;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StdFourController extends Controller
{
    public function index()
    {
        $items = Std4::all();
        $current_year = date('Y');
        $students = Std4::getStudents($current_year);
        $lesson = [['value' => 'Mathematics', 'text' => 'Mathematics'], ['value' => 'English', 'text' => 'English'], ['value' => 'Kiswahili', 'text' => 'Kiswahili'], ['value' => 'Science_and_Technology', 'text' => 'Science_and_Technology'], ['value' => 'Civics_and_Moral', 'text' => 'Civics_and_Moral'], ['value' => 'Social_Studies', 'text' => 'Social_Studies'], ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];
//        dd($students);

        return view('Grades.Std4.index', compact('items', 'students','lesson','term'));
    }

    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status', 1)->first()->id;

        $test = Std4::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();

        if ($test) {
            $StdFour = Std4::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();
            $StdFour->$inputVal = $data['marks'];
            $StdFour->update();
        } else {
            $StdFour = new Std4;
            $StdFour->$inputVal = $data['marks'];
            $StdFour->student_id = $data['student_id'];
            $StdFour->term = $data['term'];
            $StdFour->year_id = Year::where('status', 1)->first()->id;
            $StdFour->save();
        }

        return Redirect::back()->with('success', 'Successfully Added a Mark');
    }

    public function edit($id)
    {

        $item = Std4::find($id);
        $current_year = date('Y');
        $students = Std4::getStudents($current_year);
        $lesson = [['value' => 'Mathematics', 'text' => 'Mathematics'], ['value' => 'English', 'text' => 'English'], ['value' => 'Kiswahili', 'text' => 'Kiswahili'], ['value' => 'Science_and_Technology', 'text' => 'Science_and_Technology'], ['value' => 'Civics_and_Moral', 'text' => 'Civics_and_Moral'], ['value' => 'Social_Studies', 'text' => 'Social_Studies'], ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];


        return view('Grades.Std4.edit', compact('item', 'students', 'lesson', 'term'));

    }
    public function show($id)
    {
        $item = Std4::find($id);
        return view('Grades.Std4.show', compact('item'));
    }


    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Std4::find($data['Std4_id']);

        $item_exist = Std4::where('student_id', $data['student_id'])->where('id', '!=', $data['Std4_id'])->first();

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

        $mark = Std4::where('id',$request->d_Std4)->pluck($request->d_lesson);

        return json_encode($mark);
    }
}
