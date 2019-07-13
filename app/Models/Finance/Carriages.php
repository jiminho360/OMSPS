<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carriages extends Model
{
    use SoftDeletes;
    public $guarded = ['carriage_id'];
}
