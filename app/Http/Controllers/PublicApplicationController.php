<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PublicApplicationController extends Controller
{
    public function create()
    {
        $classes = SchoolClass::where('is_active', true)->orderBy('name')->get();

        return view('public.application-form', compact('classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'student_surname' => ['required', 'string', 'max:255'],
            'identity_number' => ['required', 'digits:11', 'unique:applications,identity_number'],
            'birth_date' => ['required', 'date'],
            'gender' => ['nullable', 'in:kadin,erkek,diger,belirtmek_istemiyorum'],
            'student_phone' => ['nullable', 'string', 'max:30'],
            'grade_level' => ['nullable', 'string', 'max:120'],
            'address' => ['required', 'string'],
            'proximity_degree' => ['nullable', 'string', 'max:255'],
            'current_school' => ['required', 'string', 'max:255'],
            'health_issue' => ['nullable', 'string'],
            'parent_name' => ['required', 'string', 'max:255'],
            'parent_surname' => ['required', 'string', 'max:255'],
            'parent_phone' => ['required', 'string', 'max:20'],
            'parent_email' => ['nullable', 'email', 'max:255'],
            'parent_job' => ['nullable', 'string', 'max:255'],
            'emergency_name' => ['required', 'string', 'max:255'],
            'emergency_phone' => ['required', 'string', 'max:20'],
            'classes' => ['required', 'array', 'min:1'],
            'classes.*' => [
                Rule::exists('school_classes', 'id')->where('is_active', true),
            ],
        ]);

        $classIds = $validated['classes'];
        unset($validated['classes']);

        $application = Application::create($validated);
        $application->classes()->sync($classIds);

        return back()->with('success', 'Başvurunuz başarıyla alındı. En kısa sürede sizinle iletişime geçilecektir.');
    }
}
