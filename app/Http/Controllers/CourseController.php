<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $department = $request->query('department');
        $instructor = $request->query('instructor');

        $query = Course::query();
        if ($department) {
            $query->where('department', 'like', '%' . $department . '%');
        }
        if ($instructor) {
            $query->where('instructor', 'like', '%' . $instructor . '%');
        }

        $courses = $query->get();
        return $request->ajax() ? response()->json($courses) : view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:courses',
            'credit_hours' => 'required|integer|min:1|max:6',
            'department' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $course = Course::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'message' => 'Course added successfully!',
                'course' => $course
            ]);
        }

        return redirect()->route('courses.index')
            ->with('message', 'Course added successfully!');
    }

    public function register(Request $request)
    {
        $student = Auth::user();
        $courseId = $request->course_id;

        if (!$student->courses()->where('course_id', $courseId)->exists()) {
            $student->courses()->attach($courseId);
            return response()->json(['message' => 'Course registered successfully!']);
        }

        return response()->json(['message' => 'You are already registered for this course.'], 400);
    }

    public function unregister(Request $request)
    {
        $student = Auth::user();
        $courseId = $request->course_id;

        if ($student->courses()->where('course_id', $courseId)->exists()) {
            $student->courses()->detach($courseId);
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Course unregistered successfully!']);
            } else {
                return redirect()->route('profile.show')->with('message', 'Course unregistered successfully!');
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'You are not registered for this course.'], 400);
        } else {
            return redirect()->route('profile.show')->with('error', 'You are not registered for this course.');
        }
    }
}