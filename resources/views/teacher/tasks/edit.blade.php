@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Task</h1>
    
    <form method="POST" action="{{ route('teacher.tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

  
        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $task->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

      
        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

     
        <div class="mb-3">
            <label for="points" class="form-label">Points</label>
            <input type="number" name="points" class="form-control" value="{{ old('points', $task->points) }}" required>
            @error('points')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>
@endsection
