<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades\Std1;
use App\Models\Grades\Std3;
use App\models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StdThreeController extends Controller
{
    public function index()
    {
        $items = Std3::all();
        $current_year = date('Y');
        $students = Std3::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'English', 'text' => 'English'], ['value' => 'Kiswahili', 'text' => 'Kiswahili'], ['value' => 'Science_and_Technology', 'text' => 'Science_and_Technology'], ['value' => 'Civics_and_Moral', 'text' => 'Civics_and_Moral'], ['value' => 'Social_Studies', 'text' => 'Social_Studies'], ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];
//        dd($students);

        return view('Grades.Std3.index', compact('items', 'students', 'lesson', 'term'));
    }

    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status', 1)->first()->id;

        $test = Std3::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();

        if ($test) {
            $StdThree = Std3::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();
            $StdThree->$inputVal = $data['marks'];
            $StdThree->update();
        } else {
            $StdThree = new Std3;
            $StdThree->$inputVal = $data['marks'];
            $StdThree->student_id = $data['student_id'];
            $StdThree->term = $data['term'];
            $StdThree->year_id = Year::where('status', 1)->first()->id;
            $StdThree->save();
        }

        return Redirect::back()->with('success', 'Successfully Added a Mark');
    }

    public function show($id)
    {
        $item = Std3::find($id);
        return view('Grades.Std3.show', compact('item'));
    }

    public function edit($id)
    {

        $item = Std3::find($id);
        $current_year = date('Y');
        $students = Std3::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'English', 'text' => 'English'], ['value' => 'Kiswahili', 'text' => 'Kiswahili'], ['value' => 'Science_and_Technology', 'text' => 'Science_and_Technology'], ['value' => 'Civics_and_Moral', 'text' => 'Civics_and_Moral'], ['value' => 'Social_Studies', 'text' => 'Social_Studies'], ['value' => 'Vocational_Skills', 'text' => 'Vocational_Skills']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];


        return view('Grades.Std3.edit', compact('item', 'students', 'lesson', 'term'));
    }

    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Std3::find($data['Std3_id']);

        $item_exist = Std3::where('student_id', $data['student_id'])->where('id', '!=', $data['Std3_id'])->first();

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
        $item = Std3::find($id);
        $item->delete();

        return Redirect::back()->with('success','Grades Successfully Deleted');
    }
    public function getMarks(Request $request){

        $mark = Std3::where('id',$request->d_Std3)->pluck($request->d_lesson);

        return json_encode($mark);
    }
}
