<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'pay',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
