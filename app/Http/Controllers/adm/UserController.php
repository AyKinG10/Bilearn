<?php

namespace App\Http\Controllers\adm;


namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users=null;
        if($request->search){
            $users=User::where('name','LIKE','%'.$request->search.'%')->
            orWhere('email','LIKE','%'.$request->search.'%')
                ->with('role')->get();
        }

        else{
            $users=User::with('role')->get();
        }
        return view('adm.users',['users'=>$users]);
    }
    public function ban(User $user){
        $user->update([
            'is_active'=>false,
        ]);
        return back();
    }
    public function unban(User $user){
        $user->update([
            'is_active'=>true,
        ]);
        return back();
    }
    public function edit(User $user){
        return view('adm.users.edit',['user'=>$user,'roles'=>Role::all()]);
    }
    public function update(Request $request,User $user){
        $user->update([
            'id'=>$request->id,
            'role_id'=>$request->role_id
        ]);
        return redirect()->route('adm.users.index');
    }
}
