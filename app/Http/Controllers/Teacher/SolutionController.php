<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolutionController extends Controller
{

    public function evaluate(Solution $solution)
{
    return view('teacher.solutions.evaluate', compact('solution'));
}

public function storeEvaluation(Request $request, Solution $solution)
        {
            $request->validate([
                'points' => "required|integer|min:0|max:{$solution->task->points}"
            ]);

            $solution->update([
                'points' => $request->points,
                'evaluated_at' => now()
            ]);

            return redirect()->route('teacher.tasks.show', $solution->task_id)->with('success', 'Solution evaluated successfully!');
        }

}
