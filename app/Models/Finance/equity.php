<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class equity extends Model
{
    use softDeletes;
    public $guarded = ['Equity_id'];
}
