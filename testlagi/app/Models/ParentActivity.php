<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentActivity extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'activity_id'];
}
