<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'area_id',
        'seat_number',
        'status',
        'match_id',
    ];

    public function footballMatch()
    {
        return $this->belongsTo(FootballMatch::class, 'match_id')->withTrashed();
    }
}
