<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competition extends Model
{
    use HasFactory;
    use SoftDeletes;

      protected $guarded = [];
      public function FootballMatch(){
        return $this->hasMany(FootballMatch::class,'competition_id')->withTrashed();
      }

}
