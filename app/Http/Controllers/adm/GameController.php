<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create()
    {
        return view('adm.games.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question = Game::create($validatedData);

        // Redirect to the show page for the new question
        return redirect()->route('adm.games.index', ['question' => $question->id]);
    }
    public function index()
    {
        $questions = Game::all();
        return view('adm.games.index', compact('questions'));
    }

    public function show(Game $question)
    {
        return view('adm.games.game', compact('question'));
    }
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('adm.games.index');
    }

}
