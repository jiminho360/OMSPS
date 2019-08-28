<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
//    use SoftDeletes;
    public $guarded = ['student_id'];

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }
    public static function getStudents($year)
    {
        return DB::select('SELECT * FROM students WHERE (admission_year -'.$year.') = 0 ORDER BY first_name ASC');
    }
}
