<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "chapters";

    protected $fillable = [
        'title',
        'description',
        'order',
        'course_id'
    ];

    protected static function deleteRelation($model)
    {
        parent::deleteRelation($model);

        if (!empty($model->lessons)) {
            $model->lessons->each(function ($item) {
                $item->delete();
            });
        }
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, "chapter_id");
    }
}
