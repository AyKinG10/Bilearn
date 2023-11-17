<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        $allProducts = Course::all();
        return view('courses.index',['courses'=>$allProducts,'categories'=>Category::all()]);
    }

    public function coursesByCat(Category $category)
    {
        return view('courses.index',['courses'=>$category->courses,'categories'=>Category::all()]);
    }

    public function create()
    {
        return view('courses.create',['categories'=>Category::all()]);
    }


    public function store(Request $request)
    {
        $validated= $request->validate([
            'Name' => 'required|max:255',
            'Wallpaper'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=50,min_height=50',
            'Description'=>'required',
            'Videos'=>'required',
            'Price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        $fileName=time().$request->file('Wallpaper')->getClientOriginalName();
        $image_path = $request->file('Wallpaper')->storeAs('courses',$fileName,'public');
        $validated['Wallpaper'] = '/storage/'.$image_path;

        $videoFileName = time() . $request->file('Videos')->getClientOriginalName();
        $video_path = $request->file('Videos')->storeAs('videos', $videoFileName, 'public');
        $validated['Videos'] = '/storage/' . $video_path;
        Auth::user()->courses()->create($validated);
        return redirect(route('courses.index'))->with('message','Successfully');
    }

    public function show(Course $course)
    {
        return view('courses.show',['courses'=>$course,'comment'=>Comment::all(),'categories'=>Category::all()]);
    }


    public function edit(Course $course)
    {
        return view('courses.edit',['courses'=>$course, 'categories'=>Category::all()]);
    }

    public function update(Request $request, Course $course)
    {
        $course->update([
            'Name'=>$request->input('Name'),
            'Wallpaper'=>$request->input('Wallpaper'),
            'Description'=>$request->input('Description'),
            'Videos'=>$request->input('Videos'),
            'Price'=>$request->input('Price'),
            'category_id'=>$request->category_id,
        ]);
        return redirect(route('courses.index'))->with('message','Courses Updated Sucsessfully');
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect(route('courses.index'))->with('message','Products deleted sucsessfully');
    }
}
