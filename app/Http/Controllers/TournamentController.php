<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class TournamentController extends Controller
{
    public function index()
    {
        return Tournament::all();
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'start_date_time' => 'required|date',
            'end_date_time' => 'nullable|date',
            'max_participants' => 'required|integer|min:1',
            'status' => 'nullable|string|max:8',
            'submission_deadline' => 'nullable|date',
            'winner_id' => 'nullable|exists:users,id',
        ]);

        $tournament = Tournament::create($validated);
        return response()->json($tournament, 201);
    }


    public function show(Tournament $tournament)
    {
        return $tournament;
    }


    public function update(Request $request, Tournament $tournament)
    {
        $validated = $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'start_date_time' => 'sometimes|date',
            'end_date_time' => 'nullable|date',
            'max_participants' => 'sometimes|integer|min:1',
            'status' => 'nullable|string|max:8',
            'submission_deadline' => 'nullable|date',
            'winner_id' => 'nullable|exists:users,id',
        ]);

        $tournament->update($validated);
        return response()->json($tournament, 200);
    }


    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return response()->json(null, 204);
    }
}