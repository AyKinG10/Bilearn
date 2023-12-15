<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        $categories= Category::all();
        return view('categories.index',['categories'=>$categories]);
    }
    public function create(){
        return view('categories.create',['categories'=>Category::all()]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'Name_kz'=>'required|max:50',
            'Name_ru'=>'required|max:50',
            'Name_en'=>'required|max:50',
            'catImg'=>'required|image|mimes:jpg,png,jpg,webp,jpeg,gif,svg|max:2048'
        ]);
        $fileName=time().$request->file('catImg')->getClientOriginalName();
        $image_path = $request->file('catImg')->storeAs('categories',$fileName,'public');
        $validated['catImg'] = '/storage/'.$image_path;
        Category::create($validated);
        return redirect()->route('categories.index',['categories'=>Category::all()])->with('Successfully','Added a new category');
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index');
    }
}
