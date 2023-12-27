<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['Name','Description','Wallpaper','Videos','Price','category_id','user_id', 'teacher_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function comments(){
        return $this->belongsTo(Comment::class);
    }
    public function usersLiked()
    {
        return $this->belongsToMany(Course::class, 'user_course')->withTimestamps();
    }

    public function lessons(){
        return $this->belongsTo(Lesson::class);
    }
    public function paids()
    {
        return $this->hasMany(Paid::class, 'course_id');
    }

    public function isPaid()
    {
        $user = auth()->user();

        return Paid::isUserPaidForCourse($user->id, $this->id);
    }
}
