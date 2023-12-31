<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Paid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function favorites(Course $course){
        $fav=Auth::user()->coursesLiked()->get();
        $isCreator = Auth::user()->id == $course->teacher_id;
        $isPaid = $course->isPaid();
        return view('courses.favorite',['courses'=>$fav,'isCreator'=>$isCreator,'isPaid'=>$isPaid]);
    }
    public function index()
    {
        $allCourses = Course::all();
        return view('courses.index',['courses'=>$allCourses,'categories'=>Category::all()]);
    }

    public function coursesByCat(Category $category)
    {
        return view('courses.index',['courses'=>$category->courses,'categories'=>Category::all()]);
    }

    public function create()
    {
        $this->authorize('create', Course::class);
        $teachers = User::where('role_id', '=', 4)->get();
        return view('courses.create',['categories'=>Category::all(), 'teachers' => $teachers]);
    }


    public function store(Request $request)
    {
        $validated= $request->validate([
            'Name' => 'required|max:255',
            'Wallpaper'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=50,min_height=50',
            'Description'=>'required',
            'Price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'teacher_id' => 'numeric|exists:users,id'
        ]);
        $fileName=time().$request->file('Wallpaper')->getClientOriginalName();
        $image_path = $request->file('Wallpaper')->storeAs('courses',$fileName,'public');
        $validated['Wallpaper'] = '/storage/'.$image_path;
        Auth::user()->courses()->create($validated);
        return redirect(route('courses.index'))->with('message','Successfully');
    }

    public function show(Course $course, Lesson $lesson)
    {
        $teacher = User::where('id', '=', $course->teacher_id)->first();
        $lessons = Lesson::where('course_id', '=', $course->id)->get();
        $comments = Comment::where('course_id' ,'=', $course->id)->get();
        $isCreator = Auth::user()->id == $course->teacher_id;
        $isPaid = $course->isPaid();
        return view('courses.show',['courses'=>$course,
            'comments'=>$comments,
            'lessons'=>$lessons,
            'lesson_id' => $lesson,
            'categories'=>Category::all(),
            'teacher' => $teacher,
            'isCreator' => $isCreator,
            'isPaid'=>$isPaid]);
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
    public function courseLike(Course $course)
    {
        $likedCourse = Auth::user()->coursesLiked()->where('course_id', $course->id)->first();

        if ($likedCourse != null) {
            Auth::user()->coursesLiked()->detach($course->id);
        } else {
            Auth::user()->coursesLiked()->attach($course->id);
        }

        return redirect(route('courses.favorite', $course->id));
    }
    public function buyCourse(Course $course)
    {
        return view('courses.bought',['courses'=>$course]);
    }
    public function purchase(Course $course)
    {
        $user = auth()->user();

        if ($user->coursesPurchased()->where('course_id', $course->id)->exists()) {
            return redirect()->route('courses.show', $course)->with('warning', 'Курс уже оплачен.');
        }

        Paid::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'status' => true,
        ]);

        return redirect()->route('courses.show', $course)->with('success', 'Курс успешно куплен!');
    }

    public function purchasedCourses(Course $course)
    {
        $user = auth()->user();
        $purchasedCourses = $user->coursesPurchased()->get();
        $isCreator = Auth::user()->id == $course->teacher_id;
        $isPaid = $course->isPaid();
        return view('courses.purchased', ['purchasedCourses' => $purchasedCourses,'isCreator' => $isCreator,
            'isPaid'=>$isPaid]);
    }
}
