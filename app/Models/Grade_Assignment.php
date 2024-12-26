<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade_Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'round_id',
        'participant_a_id',
        'submission_a_id',
        'is_graded_a',
        'participant_b_id',
        'submission_b_id',
        'is_graded_b',
        'grading_deadline',
    ];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function participantA()
    {
        return $this->belongsTo(Participant::class, 'participant_a_id');
    }

    public function submissionA()
    {
        return $this->belongsTo(Submission::class, 'submission_a_id');
    }

    public function participantB()
    {
        return $this->belongsTo(Participant::class, 'participant_b_id');
    }

    public function submissionB()
    {
        return $this->belongsTo(Submission::class, 'submission_b_id');
    }
}
