<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'paid_dated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice_courses()
    {
        return $this->hasMany(InvoiceCourse::class, 'invoice_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'invoice_courses', 'invoice_id', 'course_id');
    }
}
