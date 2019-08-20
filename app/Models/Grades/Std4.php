<?php

namespace App\Models\Grades;

use App\models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Std4 extends Model
{
    use SoftDeletes;
    protected $table = 'standard_4';
    protected $fillable = ['student_id'];
    protected $guarded = [];
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public static function getStudents($year){
        return DB::select('SELECT * FROM students WHERE ('.$year.' - admission_year)=4 ORDER BY first_name ASC');
    }
    public static function getReport()
    {
        return Std4::select('student_id','id','Mathematics','English','Kiswahili','Science_and_Technology','Civics_and_Moral','Social_Studies','Vocational_Skills',DB::raw('AVG(Mathematics + English + Kiswahili + Science_and_Technology + Civics_and_Moral + Social_Studies + Vocational_Skills)/7 AS average'))
            ->groupBy('student_id','id','Mathematics','English','Kiswahili','Science_and_Technology','Civics_and_Moral','Social_Studies','Vocational_Skills')
            ->orderBy('average','DESC')
            ->get();
//            SELECT student_id,AVG(mathematics + reading_and_writing + english + art_and_craft)/4 AS average FROM nursery GROUP BY student_id ORDER BY average DESC
    }

    public static function avgMath($term)
    {
        return Std4::where('term', $term)->avg('Mathematics');
        //SELECT AVG(Mathematics) FROM `standard_4` where term = 1
    }

    public static function avgEng($term)
    {
        return Std4::where('term', $term)->avg('English');
        //SELECT AVG(English) FROM `standard_4 where term = 1
    }

    public static function avgKis($term)
    {
        return Std4::where('term', $term)->avg('Kiswahili');
        //SELECT AVG(Kiswahili) FROM `standard_4` where term = 1
    }

    public static function avgScTec($term)
    {
        return Std4::where('term', $term)->avg('Science_and_Technology');
        //SELECT AVG(Science_and_Technology) FROM `standard_4` where term = 1
    }

    public static function avgCivMor($term)
    {
        return Std4::where('term', $term)->avg('Civics_and_Moral');
        //SELECT AVG(Civics_and_Moral) FROM `standard_4` where term = 1
    }

    public static function avgSs($term)
    {
        return Std4::where('term', $term)->avg('Social_Studies');
        //SELECT AVG(Social_Studies) FROM `standard_4` where term = 1
    }

    public static function avgVS($term)
    {
        return Std4::where('term', $term)->avg('Vocational_Skills');
        //SELECT AVG(Vocational_Skills) FROM `standard_4` where term = 1
    }
    public static function maxMath($term)
    {
        return Std4::where('term', $term)->max('Mathematics');
        //SELECT MAX(Mathematics) FROM `standard_4` WHERE term = 1
    }

    public static function maxEng($term)
    {
        return Std4::where('term', $term)->max('English');
        //SELECT MAX(English) FROM `standard_4` WHERE term = 1
    }

    public static function maxKis($term)
    {
        return Std4::where('term', $term)->max('Kiswahili');
        //SELECT MAX(Kiswahili) FROM `standard_4` where term = 1
    }

    public static function maxScTec($term)
    {
        return Std4::where('term', $term)->max('Science_and_Technology');
        //SELECT MAX(Science_and_Technology) FROM `standard_4 where term = 1
    }

    public static function maxCivMor($term)
    {
        return Std4::where('term', $term)->max('Civics_and_Moral');
        //SELECT MAX(Civics_and_Moral) FROM `standard_4` where term = 1
    }

    public static function maxSs($term)
    {
        return Std4::where('term', $term)->max('Social_Studies');
        //SELECT MAX(Social_Studies) FROM `standard_4` where term = 1
    }

    public static function maxVS($term)
    {
        return Std4::where('term', $term)->max('Vocational_Skills');
        //SELECT MAX(Vocational_Skills) FROM `standard_4` where term = 1
    }


}
