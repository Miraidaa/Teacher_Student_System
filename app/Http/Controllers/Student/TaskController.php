<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show($id)
    {
        // Show task details + form to submit solution
    }

    public function submit(Request $request, $taskId)
    {
        // Save student's submitted solution
    }
}
