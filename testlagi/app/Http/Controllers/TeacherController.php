<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Class1;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $activities = Activity::all();
        $classes = Class1::all(['id', 'class_name']);
        return view('teacher.dashboard', compact('activities', 'classes'));
    }
}
