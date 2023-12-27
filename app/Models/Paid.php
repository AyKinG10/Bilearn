<?php

// В модели Paid
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    use HasFactory;

    protected $table = 'paids';

    protected $fillable = [
        'user_id',
        'course_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function isUserPaidForCourse($userId, $courseId)
    {
        return self::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->where('status', true) // Проверка статуса "paid"
            ->exists();
    }
    public function markAsPaid()
    {
        $this->update(['status' => true]);
    }

    public function markAsUnpaid()
    {
        $this->update(['status' => false]);
    }
}
