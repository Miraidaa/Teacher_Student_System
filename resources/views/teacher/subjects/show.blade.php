@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="mb-0">{{ $subject->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $subject->description }}</p>
            <p><strong>Subject Code:</strong> <span class="badge bg-secondary">{{ $subject->subject_code }}</span></p>
            <p><strong>Credit Value:</strong> <span class="badge bg-success">{{ $subject->credit }}</span></p>
            <p><strong>Created At:</strong> {{ $subject->created_at ? $subject->created_at->format('Y-m-d H:i') : 'N/A' }}</p>
            <p><strong>Last Updated:</strong> {{ $subject->updated_at ? $subject->updated_at->format('Y-m-d H:i') : 'N/A' }}</p>
            <p><strong>Number of Students Enrolled:</strong> <span class="fw-bold">{{ $studentCount }}</span></p>
        </div>
    </div>

    <h2 class="mt-4">Enrolled Students</h2>
    @if ($students->count())
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">No students enrolled in this subject yet.</p>
    @endif

    <a href="{{ route('teacher.subjects.edit', $subject->id) }}" class="btn btn-warning mt-3">Edit Subject</a>
    <a href="{{ route('teacher.subjects.index') }}" class="btn btn-outline-primary mt-3">Back to Subjects</a>
    <form action="{{ route('teacher.subjects.destroy', $subject->id) }}" method="POST" class="mt-3">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?')">Delete Subject</button>
</form>
    <a href="{{ route('teacher.tasks.create', $subject->id) }}" class="btn btn-primary mt-3">New Task</a>


    <h2 class="mt-4">Tasks</h2>
    @if ($subject->tasks->count())
    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Task Name</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subject->tasks as $task)
                <tr>
                    <td>
                        <a href="{{ route('teacher.tasks.show', $task->id) }}">{{ $task->name }}</a>
                    </td>
                    <td>{{ $task->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-muted">No tasks have been added for this subject yet.</p>
@endif


</div>
@endsection
