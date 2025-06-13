@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Create a New Task for {{ $subject->name }}</h1>
    <form method="POST" action="{{ route('teacher.tasks.store', $subject->id) }}">
        @csrf

     
        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

   
        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

      
        <div class="mb-3">
            <label for="points" class="form-label">Points</label>
            <input type="number" name="points" class="form-control" value="{{ old('points') }}" required>
            @error('points')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create Task</button>
    </form>
</div>
@endsection
