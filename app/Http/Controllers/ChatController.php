<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->orWhere('reciever_id', $user->id);
        })
            ->orderBy('created_at')
            ->get();

        return view('courses.chat-index', compact('messages'));
    }

    public function show(User $user)
    {
        $authUser = auth()->user();
        $otherUser = $user;
        $messages = Message::where('sender_id', $authUser->id)
            ->where('reciever_id', $otherUser->id)
            ->orWhere('sender_id', $otherUser->id)
            ->where('reciever_id', $authUser->id)
            ->orderBy('created_at')
            ->get();

        return view('courses.chat', compact('messages', 'otherUser'));
    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'sender_id' => auth()->id(),
            'reciever_id' => $request->reciever_id,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }

    public function loadMessages(User $user)
    {
        $authUser = auth()->user();
        $messages = Message::where('sender_id', $authUser->id)
            ->where('reciever_id', $user->id)
            ->orWhere('sender_id', $user->id)
            ->where('reciever_id', $authUser->id)
            ->orderBy('created_at')
            ->get();

        return View::make('courses.load-messages', compact('messages'))->render();
    }
}
