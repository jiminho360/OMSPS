<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class inventories extends Model
{
    use softDeletes;
    public $guarded = ['Inventory_id'];
}
