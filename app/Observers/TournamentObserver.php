<?php

namespace App\Observers;

use App\Models\Tournament;
use App\Models\Participant;


class TournamentObserver
{
    public function created(Participant $participant)
    {
        $tournament = $participant->tournament;

        if ($tournament) {
            $tournament->current_participants = $tournament->participants()->count();
            $tournament->save();
        }
    }

    public function deleted(Participant $participant)
    {
        $tournament = $participant->tournament;

        if ($tournament) {
            $tournament->current_participants = $tournament->participants()->count();
            $tournament->save();
        }
    }
}
