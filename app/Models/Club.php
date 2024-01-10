<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
  use HasFactory;

  protected $guarded = [];
  public function competitions()
  {
    return $this->belongsTo(Competition::class, 'competition_id')->withTrashed();
  }
}
