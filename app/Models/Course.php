<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'details',
        'price',
        'image',
        'lecturer_id',
    ];

    protected static function deleteRelation($model)
    {
        parent::deleteRelation($model);

        if (!empty($model->chapters)) {
            $model->chapters->each(function ($item) {
                $item->delete();
            });
        }
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'course_id');
    }
}
