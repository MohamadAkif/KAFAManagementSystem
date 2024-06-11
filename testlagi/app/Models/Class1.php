<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'class_name',
        'teacher_name',
    ];

    protected $table = 'class1s';

    public function activities()
    {
        return $this->hasMany(Activity::class, 'class_id');
    }
}
