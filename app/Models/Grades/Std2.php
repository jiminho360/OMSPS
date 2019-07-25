<?php

namespace App\Models\Grades;

use App\models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Std2 extends Model
{
    protected $table = 'standard_2';
    public function student(){
        return $this->belongsTo(Student::class,'students_id');
    }
    public function person()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public static function getStudents($year){
        return DB::select('SELECT * FROM students WHERE ('.$year.' - admission_year)=2 ORDER BY first_name ASC');
    }
    public static function getReport()
    {
        return Std2::select('student_id','id','mathematics','Reading','Writing','Science',DB::raw('AVG(mathematics + reading + writing + Science)/4 AS average'))
            ->groupBy('student_id','id','mathematics','Reading','Writing','Science')
            ->orderBy('average','DESC')
            ->get();
//            SELECT student_id,AVG(mathematics + reading_and_writing + english + art_and_craft)/4 AS average FROM nursery GROUP BY student_id ORDER BY average DESC
    }
    public static function avgMath($term)
    {
        return Std2::where('term', $term)->avg('Mathematics');
        //SELECT AVG(mathematics) FROM `standard_2` where term = 1
    }

    public static function avgRead($term)
    {
        return Std2::where('term', $term)->avg('Reading');
        //SELECT AVG(Reading) FROM `standard_2` where term = 1
    }

    public static function avgWr($term)
    {
        return Std2::where('term', $term)->avg('Writing');
        //SELECT AVG(Writing) FROM `standard_2` where term = 1
    }

    public static function avgSc($term)
    {
        return Std2::where('term', $term)->avg('Science');
        //SELECT AVG(Science) FROM `standard_2` where term = 1
    }
    public static function maxMath($term)
    {
        return Std2::where('term', $term)->max('Mathematics');
        //SELECT MAX(mathematics) FROM `standard_2` WHERE term = 1
    }

    public static function maxRead($term)
    {
        return Std2::where('term', $term)->max('Reading');
        //SELECT MAX(Reading) FROM `standard_2` WHERE term = 1
    }

    public static function maxWr($term)
    {
        return Std2::where('term', $term)->max('Writing');
        //SELECT MAX(Writing) FROM `standard_2` WHERE term = 1
    }

    public static function maxSc($term)
    {
        return Std2::where('term', $term)->max('Science');
        //SELECT MAX(Science) FROM `standard_2` WHERE term = 1
    }

}
