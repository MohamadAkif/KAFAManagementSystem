<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Class1;

class ActivityController extends Controller
{

    public function create()
    {
        $classes = Class1::all();
        return view('activities.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|string|max:255',
            'activity_name' => 'required|string|max:255',
            'activity_description' => 'required|string',
            'class_id' => 'required|exists:class1s,id',
            'subject_id' => 'required|string|max:255',
            'activity_date' => 'required|date',
        ]);

        $class = Class1::find($request->class_id);
        
        if (!$class) {
            return redirect()->back()->withErrors(['class_id' => 'Selected class does not exist.'])->withInput();
        }

            Activity::create([
                'activity_id' => $request->activity_id,
                'activity_name' => $request->activity_name,
                'activity_description' => $request->activity_description,
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id,
                'class_name' => $class->class_name,
                'activity_date' => $request->activity_date,
        ]);

        return redirect()->route('teacher.list_activities')->with('success', 'Activity created successfully.');
    }

    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }
}
