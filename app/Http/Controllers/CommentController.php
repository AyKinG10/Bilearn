<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $req){
        $validated=$req->validate([
            'content'=>'required',
            'course_id'=>'required|numeric|exists:courses,id',
        ]);
        Auth::user()->comments()->create($validated);
        return back()->with("Comments is created sucsessfully");
    }

    public function edit(Comment $comment){
        return view('comment.edit',['comment'=>$comment,'categories'=>Category::all()]);
    }

    public function update(Request $req,comment $comment){
        $comment->update([
            'content'=>$req->input('content'),
            'course_id'=>$req->input('course_id'),

        ]);
        return redirect(route('courses.show',[$comment->course_id]));
    }

    public function destroy(Comment $comment){
        $this->authorize('delete',$comment);
        $comment->delete();
        return redirect(route('courses.show',[$comment->course_id]));
    }
}
