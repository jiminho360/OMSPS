<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carriages extends Model
{
    use SoftDeletes;

    public $guarded = ['carriage_id'];

    public static function getInward($year_id)
    {
        return self::where('year_id',$year_id)->whereNull('deleted_at')->sum('inward_value');
    }

    public static function getOutward($year_id)
    {
        return self::where('year_id',$year_id)->whereNull('deleted_at')->sum('outward_value');
    }
}
