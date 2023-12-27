<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles= Role::all();
        return view('adm.roles.index',['roles'=>$roles]);
    }
    public function create(){
        return view('adm.roles.create',['roles'=>Role::all()]);
    }
    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|max:25'
        ]);
        Role::create($validated);
        return redirect()->route('adm.roles.index',['roles'=>Role::all()])->with('Successfully','Added a new role');
    }
    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('adm.roles.index');
    }
}
