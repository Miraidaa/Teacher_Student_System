<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::withTrashed()->where('teacher_id', auth()->id())->get();
        return view('teacher.subjects.index', compact('subjects'));
    }


    public function create()
    {
        return view('teacher.subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'subject_code' => [
                'required',
                'regex:/^IK-[A-Z]{3}[0-9]{3}$/'
            ],
            'credit' => 'required|integer'
        ]);

        Subject::create([
            'name' => $request->name,
            'description' => $request->description,
            'subject_code' => $request->subject_code, 
            'credit' => $request->credit,
            'teacher_id' => auth()->id()
        ]);

        return redirect()->route('teacher.subjects.index')->with('success', 'Subject created successfully!');
    }

    public function show(Subject $subject)
    {
        $students = $subject->students; 
        $studentCount = $students->count();

        return view('teacher.subjects.show', compact('subject', 'students', 'studentCount'));
    }

    public function edit(Subject $subject)
    {
        return view('teacher.subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'subject_code' => [
                'required',
                'regex:/^IK-[A-Z]{3}[0-9]{3}$/'
            ],
            'credit' => 'required|integer'
        ]);

        $subject->update($request->all());

        return redirect()->route('teacher.subjects.show', $subject->id)->with('success', 'Subject updated successfully!');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('teacher.subjects.index')->with('success', 'Subject deleted successfully!');
    }

    public function restore($id)
{
    $subject = Subject::withTrashed()->find($id);

    if ($subject) {
        $subject->restore();
        return redirect()->route('teacher.subjects.index')->with('success', 'Subject restored successfully!');
    }

    return redirect()->route('teacher.subjects.index')->with('error', 'Subject not found.');
}

}
