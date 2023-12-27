<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{

    public function index(){
        $questions = Question::all();
        return view('adm.questions.index',['questions'=>$questions]);
    }
    public function create(){
        return view('adm.questions.create',['questions'=>Question::all()]);
    }
    public function store(Request $request){
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
    public function destroy(Question $question){
        $question->delete();
        return redirect()->route('adm.questions.index');
    }
}
