<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class current_assets extends Model
{
  use softDeletes;
    public $guarded = ['CurrentAsset_id'];
}
