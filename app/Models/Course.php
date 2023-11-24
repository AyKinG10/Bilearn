<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['Name','Description','Wallpaper','Videos','Price','category_id','user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->belongsTo(Comment::class);
    }
    public function usersLiked(){
        return $this->belongsToMany(User::class,'user_course')
            ->withTimestamps();
    }
}
