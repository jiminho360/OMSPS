<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    public $guarded = ['employee_id'];

    public function nationality()
    {
        return $this->belongsTo(nationality::class, 'nationality_id');
    }

    public function religion()
    {
        return $this->belongsTo(religion::class, 'religion_id');
    }

//    public function userType()
//    {
//        return $this->belongsTo(UserType::class, 'user_type');
//    }
}
