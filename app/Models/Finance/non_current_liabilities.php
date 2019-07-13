<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class non_current_liabilities extends Model
{
    use softDeletes;
    public $guarded = ['NonCurrentLiability_id'];
}
