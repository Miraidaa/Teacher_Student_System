@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="mb-0">{{ $task->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p><strong>Points:</strong> <span class="badge bg-success">{{ $task->points }}</span></p>
            <p><strong>Number of Submitted Solutions:</strong> {{ $submittedSolutions }}</p>
            <p><strong>Number of Evaluated Solutions:</strong> {{ $evaluatedSolutions }}</p>
        </div>
    </div>

    <a href="{{ route('teacher.subjects.show', $task->subject_id) }}" class="btn btn-outline-primary mt-3">Back to Subject</a>
    <a href="{{ route('teacher.tasks.edit', $task->id) }}" class="btn btn-warning mt-3">Edit Task</a>

  
    <h2 class="mt-4">Submitted Solutions</h2>

            @if ($solutions->count())
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Submission Date</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Points Earned</th>
                            <th>Evaluation Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solutions as $solution)
                            <tr>
                                <td>{{ $solution->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $solution->student->name }}</td>
                                <td>{{ $solution->student->email }}</td>
                                <td>{{ $solution->evaluated_at ? $solution->points : 'Pending' }}</td>
                                <td>{{ $solution->evaluated_at ? $solution->evaluated_at->format('Y-m-d H:i') : 'Not Evaluated' }}</td>
                                <td>
                                    @if (!$solution->evaluated_at)
                                        <a href="{{ route('teacher.solutions.evaluate', $solution->id) }}" class="btn btn-warning">Evaluate</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No solutions have been submitted for this task yet.</p>
            @endif


</div>
@endsection
