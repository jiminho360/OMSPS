<?php

namespace App\Models\Grades;

use App\models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Nursery extends Model
{
    protected $table = 'nursery';
use SoftDeletes;
    protected $guarded = ['nursery_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public static function getStudents($year)
    {
        return DB::select('SELECT * FROM students WHERE (admission_year -'.$year.') = 0 ORDER BY first_name ASC');
    }
    public static function getReport()
    {
        return Nursery::select('student_id', 'id', 'mathematics', 'reading_and_writing', 'english', 'art_and_craft', DB::raw('AVG(mathematics + reading_and_writing + english + art_and_craft)/4 AS average'))
            ->groupBy('student_id', 'id', 'mathematics', 'reading_and_writing', 'english', 'art_and_craft')
            ->orderBy('average', 'DESC')
            ->get();
//            SELECT student_id,AVG(mathematics + reading_and_writing + english + art_and_craft)/4 AS average FROM nursery GROUP BY student_id ORDER BY average DESC
    }

    public static function avgMath($term)
    {
        return Nursery::where('term', $term)->avg('mathematics');
        //SELECT AVG(mathematics) FROM `nursery` where term = 1
    }

    public static function avgEng($term)
    {
        return Nursery::where('term', $term)->avg('english');
        //SELECT AVG(english) FROM `nursery` where term = 1
    }

    public static function avgRW($term)
    {
        return Nursery::where('term', $term)->avg('reading_and_writing');
        //SELECT AVG(reading_and_writing) FROM `nursery` where term = 1
    }

    public static function avgAC($term)
    {
        return Nursery::where('term', $term)->avg('art_and_craft');
        //SELECT AVG(art_and_craft) FROM `nursery` where term = 1
    }

    public static function maxMath($term)
    {
        return Nursery::where('term', $term)->max('mathematics');
        //SELECT MAX(mathematics) FROM `nursery` WHERE term = 1
    }

    public static function maxEng($term)
    {
        return Nursery::where('term', $term)->max('english');
        //SELECT MAX(english) FROM `nursery` WHERE term = 1
    }

    public static function maxRW($term)
    {
        return Nursery::where('term', $term)->max('reading_and_writing');
        //SELECT MAX(reading_and_writing) FROM `nursery` WHERE term = 1
    }

    public static function maxAC($term)
    {
        return Nursery::where('term', $term)->max('art_and_craft');
        //SELECT MAX(art_and_craft) FROM `nursery` WHERE term = 1
    }





}

