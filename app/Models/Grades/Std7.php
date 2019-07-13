<?php

namespace App\Models\Grades;

use App\models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Std7 extends Model
{
    protected $table = 'standard_7';

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public static function getStudents($year){
        return DB::select('SELECT * FROM students WHERE ('.$year.' - admission_year)=7 ORDER BY first_name ASC');
    }
    public static function getReport()
    {
        return Std7::select('student_id','id','Mathematics','English','Kiswahili','Science','ICT','PDS','History','Geography','Civics','Vocational_Skills',DB::raw('AVG(Mathematics + English + Kiswahili + Science + ICT + PDS + History + Geography + Civics + Vocational_Skills)/10 AS average'))
            ->groupBy('student_id','id','Mathematics','English','Kiswahili','Science','ICT','PDS','History','Geography','Civics','Vocational_Skills')
            ->orderBy('average','DESC')
            ->get();
//            SELECT student_id,AVG(mathematics + reading_and_writing + english + art_and_craft)/4 AS average FROM nursery GROUP BY student_id ORDER BY average DESC
    }
}
