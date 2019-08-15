<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class indirect_income extends Model
{
    use softDeletes;

    public $guarded = ['IndirectIncome_id'];

    public static function getValue($year_id)
    {
        return self::where('year_id',$year_id)->sum('value');
    }
}
