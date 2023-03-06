<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "lessons";

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'status',
        'type',
        'content',
        'duration',
        'order',
        'chapter_id',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }

    // public function quiz()
    // {
    //     return $this->belongsTo(Quiz::class, 'model_id');
    // }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class, 'lesson_id');
    // }

    // public function userLessons()
    // {
    //     return $this->hasMany(UserLesson::class, "lesson_id");
    // }
}
