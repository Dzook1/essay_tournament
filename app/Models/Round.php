<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'round_number',
        'start_date_time',
        'end_date_time',
        'status',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function matchups()
    {
        return $this->hasMany(Matchup::class);
    }
}
