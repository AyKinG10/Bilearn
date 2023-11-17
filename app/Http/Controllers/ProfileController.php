<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProducts = Course::all();
        $user = Auth::user();
        return view('profile.profile',['courses'=>$allProducts,'categories'=>Category::all(), 'user' => $user], );
    }


    public function update(Request $request,User $user)
    {
        // Проверяем, аутентифицирован ли пользователь
        if (Auth::check()) {
            // Получаем текущего аутентифицированного пользователя
            $user = Auth::user();

            // Проверяем, соответствует ли идентификатор пользователя в запросе текущему пользователю
                $user->name = $request->input('name');
                $user->email = $request->input('email');

                // Обработка фото профиля, если оно загружено
                if ($request->hasFile('profImg')) {
                    $photoPath = $request->file('profImg')->store('profile-photos', 'public');
                    $user->profImg= $photoPath;
                }

                $user->save();

                return redirect('/profile')->with('success', 'Профиль успешно обновлен.');
            } else {
                return redirect('/')->with('error', 'У вас нет прав для изменения этого профиля.');
            }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
