@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Evaluate Solution</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Task Description:</strong> {{ $solution->task->description }}</p>
            <p><strong>Student Solution:</strong> {{ $solution->content }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('teacher.solutions.storeEvaluation', $solution->id) }}">
        @csrf

        <!-- Points -->
        <div class="mb-3">
            <label for="points" class="form-label">Assign Points (0 - {{ $solution->task->points }})</label>
            <input type="number" name="points" class="form-control" min="0" max="{{ $solution->task->points }}" required>
            @error('points')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Submit Evaluation</button>
    </form>
</div>
@endsection
