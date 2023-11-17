<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['Name_kz','Name_ru','Name_en','catImg'];

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
