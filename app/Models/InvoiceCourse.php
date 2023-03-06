<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceCourse extends Model
{
    use HasFactory;

    protected $fillable =[
        'invoice_id',
        'course_id'
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
