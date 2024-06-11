<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class1;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Class1::all(['id', 'teacher_id', 'class_name', 'teacher_name']);
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'teacher_id' => 'required',
            'class_name' => 'required',
            'teacher_name' => 'required',
        ]);
    
        Class1::create($request->all());
        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(Class1 $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, Class1 $class)
{
    $request->validate([
        'teacher_id' => 'required',
        'class_name' => 'required',
        'teacher_name' => 'required',
    ]);

    $class->update($request->all());
    return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
}

    public function destroy(Class1 $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
