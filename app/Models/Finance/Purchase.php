<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    public $guarded = [];

    public static function getPurchase($year_id)
    {
        return self::where('year_id',$year_id)->sum('purchases_value');
    }

    public static function getReturnValue($year_id)
    {
        return self::where('year_id',$year_id)->sum('purchase_return_value');
    }
}
