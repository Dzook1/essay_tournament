<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function index()
    {
        return response()->json(Participant::all(), 200);
    }


    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tournament_id' => 'required|exists:tournaments,id',
            'status' => 'required|string|max:12',
        ]);

        // Create and return the new participant
        $participant = Participant::create($validated);
        return response()->json($participant, 201);
    }

}
