<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nationality extends Model
{
  use SoftDeletes;
  protected $table = 'nationalities';
  protected $guarded = ['nationality_id'];
}
