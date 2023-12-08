<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{

    public function index()
    {
    }


    public function create(Course $course)
    {
        $course_id = $course->id;

        $this->authorize('create', Course::class);
        return view('videos.create',['lessons'=>Lesson::all(), 'course' => $course_id]);
    }


    public function store(Request $request)
    {

        $validated= $request->validate([
            'title' => 'required|max:255',
            'video'=>'required|mimes:mkv,mp4,mov,avi',
            'description'=>'required',
            'course_id' => 'required'
        ]);



        $videoFileName = time() . $request->file('video')->getClientOriginalName();
        $video_path = $request->file('video')->storeAs('video', $videoFileName, 'public');
        $validated['video'] = '/storage/' . $video_path;

        Lesson::create($validated);
        return redirect(route('lesson.create',[$request->course_id]))->with('message','Successfully');
    }

    public function show(Lesson $lesson)
    {
    }


    public function edit(Lesson $lesson)
    {
        return view('videos.edit',['videos'=>$lesson]);
    }

    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return back();
    }


    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect(route('courses.index'))->with('message','Products deleted sucsessfully');
    }
}
