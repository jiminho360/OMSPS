<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class drawing extends Model
{
    use softDeletes;
    public $guarded = ['Drawing_id'];
}
