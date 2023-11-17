<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['content','course_id','user_id'];

    use HasFactory;

    public function course(){

        return $this->belongsTo(Course::class);

    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
