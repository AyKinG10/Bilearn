<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments= Comment::all();
        return view('adm.comments.index',['comments'=>$comments]);
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('adm.comments.index');
    }
}
