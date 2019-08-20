<?php

namespace App\Models\Grades;

use App\models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Std6 extends Model
{
    use SoftDeletes;
    protected $table = 'standard_6';
    protected $guarded = [];
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public static function getStudents($year){
        return DB::select('SELECT * FROM students WHERE ('.$year.' - admission_year)=6 ORDER BY first_name ASC');
    }
    public static function getReport()
    {
        return Std6::select('student_id','id','Mathematics','English','Kiswahili','Science','ICT','PDS','History','Geography','Civics','Vocational_Skills',DB::raw('AVG(Mathematics + English + Kiswahili + Science + ICT + PDS + History + Geography + Civics + Vocational_Skills)/10 AS average'))
            ->groupBy('student_id','id','Mathematics','English','Kiswahili','Science','ICT','PDS','History','Geography','Civics','Vocational_Skills')
            ->orderBy('average','DESC')
            ->get();
//            SELECT student_id,AVG(mathematics + reading_and_writing + english + art_and_craft)/4 AS average FROM nursery GROUP BY student_id ORDER BY average DESC
    }
      public static function avgMath($term)
    {
        return Std6::where('term', $term)->avg('Mathematics');
        //SELECT AVG(Mathematics) FROM `standard_6` where term = 1
    }

    public static function avgEng($term)
    {
        return Std6::where('term', $term)->avg('English');
        //SELECT AVG(English) FROM `standard_6' where term = 1
    }

    public static function avgKis($term)
    {
        return Std6::where('term', $term)->avg('Kiswahili');
        //SELECT AVG(Kiswahili) FROM `standard_6` where term = 1
    }

    public static function avgSc($term)
    {
        return Std6::where('term', $term)->avg('Science');
        //SELECT AVG(Science) FROM `standard_6` where term = 1
    }

    public static function avgICT($term)
    {
        return Std6::where('term', $term)->avg('ICT');
        //SELECT AVG(ICT) FROM `standard_6` where term = 1
    }

    public static function avgPDS($term)
    {
        return Std6::where('term', $term)->avg('PDS');
        //SELECT AVG(PDS) FROM `standard_6` where term = 1
    }

    public static function avgHis($term)
    {
        return Std6::where('term', $term)->avg('History');
        //SELECT AVG(History) FROM `standard_6` where term = 1
    }
     public static function avgGeog($term)
    {
        return Std6::where('term', $term)->avg('Geography');
        //SELECT AVG(Geography) FROM `standard_6` where term = 1
    }
     public static function avgCiv($term)
    {
        return Std6::where('term', $term)->avg('Civics');
        //SELECT AVG(Civics) FROM `standard_6` where term = 1
    }
     public static function avgVS($term)
    {
        return Std6::where('term', $term)->avg('Vocational_Skills');
        //SELECT AVG(Vocational_Skills) FROM `standard_6` where term = 1
    }
    public static function maxMath($term)
    {
        return Std5::where('term', $term)->max('Mathematics');
        //SELECT MAX(Mathematics) FROM `standard_5` WHERE term = 1
    }

    public static function maxEng($term)
    {
        return Std5::where('term', $term)->max('English');
        //SELECT MAX(English) FROM `standard_5` WHERE term = 1
    }

    public static function maxKis($term)
    {
        return Std5::where('term', $term)->max('Kiswahili');
        //SELECT MAX(Kiswahili) FROM `standard_5 where term = 1
    }


    public static function maxSc($term)
    {
        return Std6::where('term', $term)->max('Science');
        //SELECT MAX(Science) FROM `standard_6` where term = 1
    }

    public static function maxICT($term)
    {
        return Std6::where('term', $term)->max('ICT');
        //SELECT MAX(ICT) FROM `standard_6` where term = 1
    }

    public static function maxPDS($term)
    {
        return Std6::where('term', $term)->max('PDS');
        //SELECT MAX(PDS) FROM `standard_6` where term = 1
    }

    public static function maxHis($term)
    {
        return Std6::where('term', $term)->max('History');
        //SELECT MAX(History) FROM `standard_6` where term = 1
    }
    public static function maxGeog($term)
    {
        return Std6::where('term', $term)->max('Geography');
        //SELECT MAX(Geography) FROM `standard_6` where term = 1
    }
    public static function maxCiv($term)
    {
        return Std6::where('term', $term)->max('Civics');
        //SELECT MAX(Civics) FROM `standard_6` where term = 1
    }
    public static function maxVS($term)
    {
        return Std6::where('term', $term)->max('Vocational_Skills');
        //SELECT MAX(Vocational_Skills) FROM `standard_6` where term = 1
    }

}
