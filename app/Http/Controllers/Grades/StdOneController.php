<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades\Std1;
use App\models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StdOneController extends Controller
{
    public function index(){
        $items = Std1::all();
        $current_year = date('Y');
        $students = Std1::getStudents($current_year);
        $lesson = [['value'=> 'mathematics','text'=>'Mathematics'],['value'=>'Reading','text'=>'Reading'],['value'=>'Writing','text'=>'Writing'],['value'=>'Science','text'=>'Science']];
        $term = [['value'=> '1','text'=>'First'],['value'=>'2','text'=>'Second'],['value'=>'3','text'=>'Third'],['value'=>'4','text'=>'Fourth']];

//        dd($students);

     return view('Grades.Std1.index',compact('items','students','lesson','term'));
    }
    public function store()
    {
        $data = Input::all();

        $inputVal = $data['lesson'];

        $year_id = Year::where('status',1)->first()->id;

        $test = Std1::where([['student_id',$data['student_id']],['year_id',$year_id],['term',$data['term']]])->first();

        if($test)
        {
            $StdOne= Std1::where([['student_id',$data['student_id']],['year_id',$year_id],['term',$data['term']]])->first();
            $StdOne->$inputVal = $data['marks'];
            $StdOne->update();
        }else{
            $StdOne = new Std1;
            $StdOne->$inputVal = $data['marks'];
            $StdOne->student_id = $data['student_id'];
            $StdOne->term = $data['term'];
            $StdOne->year_id = Year::where('status',1)->first()->id;
            $StdOne->save();
        }

        return Redirect::back()->with('success','Successfully Added a Mark');
    }

    public function edit($id){

        $item = Std1::find($id);
        $current_year = date('Y');
        $students = Std1::getStudents($current_year);
//        dd($students);
//        $lesson = [['value'=> 'mathematics','text'=>'Mathematics'],['value'=>'reading_and_writing','text'=>'Reading & Writing'],['value'=>'english','text'=>'English'],['value'=>'art_and_craft','text'=>'Art & Craft']];
        $lesson = [['value'=> 'mathematics','text'=>'Mathematics'],['value'=>'Reading','text'=>'Reading'],['value'=>'Writing','text'=>'Writing'],['value'=>'Science','text'=>'Science']];
        $term = [['value'=> '1','text'=>'First'],['value'=>'2','text'=>'Second'],['value'=>'3','text'=>'Third'],['value'=>'4','text'=>'Fourth']];


        return view('Grades.Std1.edit', compact('item','students','lesson','term'));
    }
    public function update()
    {
        $data = Input::all();
        $inputVal = $data['lesson'];

        $item = Std1::find($data['Std1_id']);

        $item_exist = Std1::where('student_id', $data['student_id'])->where('id', '!=', $data['Std1_id'])->first();

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
        $mark = Std1::where('id',$request->d_Std1)->pluck($request->d_lesson);

        return json_encode($mark);
    }
}
