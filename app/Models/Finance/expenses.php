<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class expenses extends Model
{
    use softDeletes;
    public $guarded = ['Expense_id'];
}
