<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
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
        $id = $question->id+1;


        return view('games.gameresult', compact('question', 'userAnswer', 'correctAnswer','id'));
    }
}
