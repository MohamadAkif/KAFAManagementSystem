<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ParentActivity;

class ParentController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('parent.dashboard', compact('activities'));
    }

    public function joinActivity($id)
    {
        $activity = Activity::findOrFail($id);

        ParentActivity::create([
            'parent_id' => auth()->id(),
            'activity_id' => $activity->id,
        ]);

        return redirect()->route('parent.dashboard')->with('success', 'You have successfully joined the activity.');
    }
}
