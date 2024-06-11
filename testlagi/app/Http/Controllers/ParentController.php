<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ParentActivity;

class ParentController extends Controller
{
    public function dashboard()
    {
        return view('parent.dashboard');
    }

    public function index(Request $request)
    {
        $query = Activity::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('activity_id', 'like', "%{$search}%")
                  ->orWhere('activity_name', 'like', "%{$search}%");
        }

        $activities = $query->get();

        return view('parent.activities', compact('activities'));
    }

    public function joinActivity($id)
    {
        $activity = Activity::findOrFail($id);

        $existingEntry = ParentActivity::where('parent_id', auth()->id())
        ->where('activity_id', $activity->id)
        ->first();

        if ($existingEntry) {
            return redirect()->route('parent.activities')->with('error', 'You have already joined this activity.');
        }

        ParentActivity::create([
            'parent_id' => auth()->id(),
            'activity_id' => $activity->id,
        ]);

        return redirect()->route('parent.activities')->with('success', 'You have successfully joined the activity.');
    }
    
    public function activitiesJoined()
    {
        $joinedActivities = ParentActivity::where('parent_id', auth()->id())->with('activity')->get();
        return view('parent.activities-joined', compact('joinedActivities'));
    }

    public function deleteJoinedActivity($id)
    {
        $joinedActivity = ParentActivity::where('parent_id', auth()->id())->where('activity_id', $id)->firstOrFail();
        $joinedActivity->delete();

        return redirect()->route('parent.activities-joined')->with('success', 'Activity has been removed.');
    }
}
