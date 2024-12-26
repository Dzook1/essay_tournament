<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tournament;
use Carbon\Carbon;

class UpdateTournamentStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournaments:update-statuses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tournament statuses based on start time and participant count';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $tournaments = Tournament::where('status', 'upcoming')->get();

        foreach ($tournaments as $tournament) {
            if ($now->greaterThanOrEqualTo($tournament->start_date_time)) {
                if ($tournament->current_participants == $tournament->max_participants) {
                    $tournament->status = 'pending';
                    $tournament->save();
                }
            }
        }

        $this->info('Tournament statuses checked and updated.');
    }
}
