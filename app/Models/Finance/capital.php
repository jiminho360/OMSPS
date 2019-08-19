<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class capital extends Model
{
    use SoftDeletes;
    protected $table ='Capital';
    public $guarded = ['Capital_id'];
}
