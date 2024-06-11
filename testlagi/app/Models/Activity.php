<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
    'activity_id', 
    'class_name', 
    'subject_id', 
    'class_id', 
    'activity_name', 
    'activity_description', 
    'activity_date'
    ];

    public function class1()
    {
        return $this->belongsTo(Class1::class, 'class_id');
    }
}
