<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sales extends Model
{
    use softDeletes;
    public $guarded = ['Sale_id'];
}
