<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPaymentRecord extends Model
{
    use SoftDeletes;
    protected $table = 'students_payment_records';
    public $guarded = [];
}
