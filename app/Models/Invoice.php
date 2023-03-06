<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'amount',
        'status',
        'billed_dated',
        'paid_dated'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function InvoiceCourses(){
        return $this->hasMany(InvoiceCourse::class);
    }

}
