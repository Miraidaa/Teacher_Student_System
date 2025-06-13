@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>My Subjects</h1>
    <a href="{{ route('teacher.subjects.create') }}" class="btn btn-primary mb-3">New Subject</a>

    @if ($subjects->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Description</th>
                    <th>Subject Code</th>
                    <th>Credit Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>
                            <a href="{{ route('teacher.subjects.show', $subject->id) }}">{{ $subject->name }}</a>
                        </td>
                        <td>{{ $subject->description }}</td>
                        <td>{{ $subject->subject_code }}</td>
                        <td>{{ $subject->credit }}</td>
                        <td><strong>Deleted At:</strong> {{ $subject->deleted_at ? $subject->deleted_at->format('Y-m-d H:i') : 'Active' }}</td>
                        <td>
                        @if ($subject->deleted_at)
                        <form action="{{ route('teacher.subjects.restore', $subject->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">Restore Subject</button>
                        </form>
                    @endif
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">You haven’t created any subjects yet.</p>

       

    @endif


</div>
@endsection
