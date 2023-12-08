<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,Course $course)
    {
        $query = $request->input('query');

        $keywords = explode(' ', $query);
        $results = Course::where(function ($q) use ($keywords) {
            foreach ($keywords as $keyword) {
                $q->orWhere('Name', 'LIKE', "%$keyword%");
            }
        })->get();

        return view('courses.results', ['results'=>$results]);
    }

}
