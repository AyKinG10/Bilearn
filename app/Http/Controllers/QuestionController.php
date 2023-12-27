<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function index()
    {
        $q = Question::all();
        return view('question.index', compact('q'));
    }

    public function create()
    {
        return view('question.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image'=>'required|mimes:jpg,png,jpeg,svg,gif,mp4'
        ]);
        $fileName = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('questions',$fileName,'public');
        $validated['image']='/storage/'.$image_path;
        Auth::user()->questions()->create($validated);
        return redirect()->route('questions.index')->with('message', 'Question Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        $answers = Answer::where('question_id','=',$question->id)->get();
        return view('question.show',['question'=>$question,'answers' => $answers]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {

        $question->delete();
        return redirect(route('question.index'))->with('message','Questions deleted sucsessfully');
    }
}
