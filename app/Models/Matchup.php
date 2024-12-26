<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
    use HasFactory;

    protected $fillable = [
        'round_id',
        'participant_a_id',
        'participant_b_id',
        'winner_id',
    ];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function participantA()
    {
        return $this->belongsTo(Participant::class, 'participant_a_id');
    }

    public function participantB()
    {
        return $this->belongsTo(Participant::class, 'participant_b_id');
    }

    public function winner()
    {
        return $this->belongsTo(Participant::class, 'winner_id');
    }
}
