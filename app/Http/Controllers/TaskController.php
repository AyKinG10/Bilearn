<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Course $course)
    {
        return view('tasks.create', ['course' => $course]);
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $course->tasks()->create($validated);

        return redirect(route('courses.show', $course))->with('message', 'Task created successfully');
    }

    public function edit(Course $course, Task $task)
    {
        return view('tasks.edit', ['course' => $course, 'task' => $task]);
    }

    public function update(Request $request, Course $course, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $task->update($validated);

        return redirect(route('courses.show', $course))->with('message', 'Task updated successfully');
    }

    public function getTasks(Course $course)
    {
        $tasks = $course->tasks;

        return view('tasks.index', ['tasks' => $tasks, 'course' => $course]);
    }
    public function destroy(Course $course, Task $task)
    {
        $task->delete();

        return redirect(route('courses.show', $course))->with('message', 'Task deleted successfully');
    }

    public function show(Course $course, Task $task)
    {
        return view('tasks.show', ['course' => $course, 'task' => $task]);
    }

}
