<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Subject;

class TaskController extends Controller
{
    public function create(Subject $subject)
    {
        return view('teacher.tasks.create', compact('subject'));
    }

    public function store(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'description' => 'required|string',
            'points' => 'required|integer|min:1'
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'points' => $request->points,
            'subject_id' => $subject->id
        ]);

        return redirect()->route('teacher.subjects.show', $subject->id)->with('success', 'Task created successfully!');
    }

    public function show(Task $task)
    {
        $submittedSolutions = $task->solutions()->count();
        $evaluatedSolutions = $task->solutions()->whereNotNull('evaluated_at')->count();
        $solutions = $task->solutions()->with('student')->get(); 

        return view('teacher.tasks.show', compact('task', 'submittedSolutions', 'evaluatedSolutions', 'solutions'));
    }


        public function edit(Task $task)
        {
            return view('teacher.tasks.edit', compact('task'));
        }

        public function update(Request $request, Task $task)
        {
            $request->validate([
                'name' => 'required|string|min:5',
                'description' => 'required|string',
                'points' => 'required|integer|min:1'
            ]);

            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'points' => $request->points
            ]);

            return redirect()->route('teacher.tasks.show', $task->id)->with('success', 'Task updated successfully!');
        }


}
