<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'prof_Img'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function courses(){
        return $this->hasMany(Course::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function coursesLiked(){
        return $this->belongsToMany(Course::class,'user_course')
            ->withTimestamps();
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function lessons(){
        return$this->hasMany(Lesson::class);
    }


    public function coursesPurchased(){
        return $this->belongsToMany(Course::class, 'paids')
            ->withPivot('status') // чтобы получить статус оплаты
            ->wherePivot('status', true); // фильтр только для оплаченных курсов
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }


}
