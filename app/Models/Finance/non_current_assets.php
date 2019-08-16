<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class non_current_assets extends Model
{
    use softDeletes;
    public $guarded = ['NonCurrentAsset_id'];

    public static function sumAssets()
    {
        return self::all()->sum('cost');
    }

    public static function sumDepreciation()
    {
        return self::all()->sum('depreciation_value');
    }

}
