<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class sales extends Model
{
    use softDeletes;

    public $guarded = ['Sale_id'];

    public static function sumSales()
    {
        return sales::all()->sum('value_of_sales');
    }

    public static function sumReturns()
    {
        return sales::all()->sum('value_of_returns');
    }

}
