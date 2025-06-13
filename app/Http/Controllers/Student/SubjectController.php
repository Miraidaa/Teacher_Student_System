<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        // List subjects student is enrolled in
    }

    public function availableSubjects()
    {
        // List subjects student can take
    }

    public function take($subjectId)
    {
        // Student takes a subject
    }

    public function leave($subjectId)
    {
        // Student leaves a subject
    }

    public function show($id)
    {
        // Show subject details
    }
}
