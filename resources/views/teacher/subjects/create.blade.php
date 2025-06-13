@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Create a New Subject</h1>
    
    <form method="POST" action="{{ route('teacher.subjects.store') }}">
        @csrf
        
        <!-- Subject Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Subject Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <!-- Subject Code -->
        <div class="mb-3">
            <label for="subject_code" class="form-label">Subject Code (IK-SSSNNN format)</label>
            <input type="text" name="subject_code" class="form-control" value="{{ old('subject_code') }}" required>
            @error('subject_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Credit Value -->
        <div class="mb-3">
            <label for="credit" class="form-label">Credit Value</label>
            <input type="number" name="credit" id="credit" class="form-control" value="{{ old('credit') }}" required>
            @error('credit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Subject</button>
    </form>
</div>
@endsection
