<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'start_date_time',
        'end_date_time',
        'max_participants',
        'current_participants',
        'status',
        'submission_deadline',
        'winner_id',
    ];

    protected $casts = [
        'start_date_time' => 'datetime',
        'end_date_time' => 'datetime',
        'submission_deadline' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function rounds()
    {
        return $this->hasMany(Round::class);
    }

    public function setCurrentParticipantsAttribute($value)
    {
        if ($value > $this->max_participants) {
            $this->attributes['current_participants'] = $this->max_participants;
        } else {
            $this->attributes['current_participants'] = $value;
        }
    }
}
