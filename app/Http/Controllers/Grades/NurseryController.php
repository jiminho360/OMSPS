<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades\Nursery;
use App\models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NurseryController extends Controller
{
    public function index()
    {
        $items = Nursery::all();
        $current_year = date('Y');
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'reading_and_writing', 'text' => 'Reading & Writing'], ['value' => 'english', 'text' => 'English'], ['value' => 'art_and_craft', 'text' => 'Art & Craft']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];

        $students = Student::getStudents($current_year);

        return view('Grades.nursery.index', compact('items', 'students', 'lesson', 'term'));
    }

    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status', 1)->first()->id;

        $test = Nursery::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();

        if ($test) {
            $nursery = Nursery::where([['student_id', $data['student_id']], ['year_id', $year_id], ['term', $data['term']]])->first();
            $nursery->$inputVal = $data['marks'];
            $nursery->update();
        } else {
            $nursery = new Nursery;
            $nursery->$inputVal = $data['marks'];
            $nursery->student_id = $data['student_id'];
            $nursery->term = $data['term'];
            $nursery->year_id = Year::where('status', 1)->first()->id;
            $nursery->save();
        }

        return Redirect::back()->with('success', 'Successfully Added a Mark');
    }

    public function edit($id)
    {
        $item = Nursery::find($id);
        $current_year = date('Y');
        $students = Student::getStudents($current_year);
        $lesson = [['value' => 'mathematics', 'text' => 'Mathematics'], ['value' => 'reading_and_writing', 'text' => 'Reading & Writing'], ['value' => 'english', 'text' => 'English'], ['value' => 'art_and_craft', 'text' => 'Art & Craft']];
        $term = [['value' => '1', 'text' => 'First'], ['value' => '2', 'text' => 'Second'], ['value' => '3', 'text' => 'Third'], ['value' => '4', 'text' => 'Fourth']];

        return view('Grades.nursery.edit', compact('item', 'students', 'lesson', 'term'));
    }

    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Nursery::find($data['nursery_id']);

        $item_exist = Nursery::where('student_id', $data['student_id'])->where('id', '!=', $data['nursery_id'])->first();

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
        $mark = Nursery::where('id',$request->d_nursery)->pluck($request->d_lesson);

        return json_encode($mark);
    }
}
