<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'price',
        'author',
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
