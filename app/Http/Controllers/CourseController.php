<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;


class CourseController extends Controller
{

    public function index(Request $request)
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create(Request $request)
    {

        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'academic_year' => 'required|string',
            'category' => 'required|string',
            'shift' => 'required|string',
            'medium' => 'required|string',
            'name' => 'required|string|max:255',
            'FC' => 'required|integer|min:0',
            'OC' => 'required|integer|min:0',
            'BC' => 'required|integer|min:0',
            'MBC' => 'required|integer|min:0',
            'SC_ST' => 'required|integer|min:0',
            'OTHER' => 'required|integer|min:0',
            'total' => 'required|integer|min:0',
        ]);
    
        Course::create($validatedData);
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function edit(Request $request, Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return to_route('courses.index');
    }
    public function destroy(Request $request, Course $course)
    {
        $course->delete();
        return to_route('courses.index');
    }
}
