<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|text',
        ]);

        $question = Game::create($validatedData);

        // Redirect to the show page for the new question
        return redirect()->route('games.index', ['question' => $question->id]);
    }
    public function index()
    {
        $questions = Game::all();
        return view('games.index', compact('questions'));
    }

    public function show(Game $question)
    {
        return view('games.game', compact('question'));
    }

    public function checkAnswer(Request $request, Game $question)
    {
        $userAnswer = $request->input('answer');
        $correctAnswer = $question->answer;

        // Find the next question
        $nextQuestion = Game::find($question->id + 1);

        // Check if the next question exists
        $id = $nextQuestion ? $nextQuestion->id : null;

        return view('games.gameresult', compact('question', 'userAnswer', 'correctAnswer', 'id'));
    }

}
