<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\SubjectController as TeacherSubjectController;
use App\Http\Controllers\Teacher\TaskController as TeacherTaskController;
use App\Http\Controllers\Teacher\SolutionController as TeacherSolutionController;
use App\Http\Controllers\Student\SubjectController as StudentSubjectController;
use App\Http\Controllers\Student\TaskController as StudentTaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Auth::routes();  // This automatically registers the login, register, logout, etc.


// Home page
Route::get('/', function () {
    return view('welcome');
});


// Dashboard (after login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (edit, update, delete account)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------------- TEACHER ROUTES ----------------
Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    // Subjects
    Route::get('subjects', [TeacherSubjectController::class, 'index'])->name('subjects.index');
    Route::get('subjects/create', [TeacherSubjectController::class, 'create'])->name('subjects.create');
    Route::post('subjects', [TeacherSubjectController::class, 'store'])->name('subjects.store');
    Route::get('subjects/{subject}', [TeacherSubjectController::class, 'show'])->name('subjects.show');
    Route::get('subjects/{subject}/edit', [TeacherSubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('subjects/{subject}', [TeacherSubjectController::class, 'update'])->name('subjects.update');
    Route::delete('subjects/{subject}', [TeacherSubjectController::class, 'destroy'])->name('subjects.destroy');

    // Tasks
    Route::get('subjects/{subject}/tasks/create', [TeacherTaskController::class, 'create'])->name('tasks.create');
    Route::post('subjects/{subject}/tasks', [TeacherTaskController::class, 'store'])->name('tasks.store');
    Route::get('tasks/{task}', [TeacherTaskController::class, 'show'])->name('tasks.show');
    Route::get('tasks/{task}/edit', [TeacherTaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{task}', [TeacherTaskController::class, 'update'])->name('tasks.update');

    // Solutions
    Route::get('solutions/{solution}/evaluate', [TeacherSolutionController::class, 'evaluateForm'])->name('solutions.evaluate.form');
    Route::post('solutions/{solution}/evaluate', [TeacherSolutionController::class, 'evaluate'])->name('solutions.evaluate');
});

// -------------- STUDENT ROUTES ----------------
Route::middleware(['auth', 'ensure.student'])->prefix('student')->name('student.')->group(function () {
    // Subjects
    Route::get('subjects', [StudentSubjectController::class, 'index'])->name('subjects.index');
    Route::get('subjects/available', [StudentSubjectController::class, 'availableSubjects'])->name('subjects.available');
    Route::post('subjects/{subject}/take', [StudentSubjectController::class, 'take'])->name('subjects.take');
    Route::post('subjects/{subject}/leave', [StudentSubjectController::class, 'leave'])->name('subjects.leave');
    Route::get('subjects/{subject}', [StudentSubjectController::class, 'show'])->name('subjects.show');

    // Tasks
    Route::get('tasks/{task}', [StudentTaskController::class, 'show'])->name('tasks.show');
    Route::post('tasks/{task}/submit', [StudentTaskController::class, 'submit'])->name('tasks.submit');
});

// Auth scaffolding (login, register, etc.)
require __DIR__.'/auth.php';

// Remove this second call to Auth::routes(), it is unnecessary and can cause issues
// Auth::routes();  // REMOVE THIS LINE

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']) -> name('contact');
Route::get('/teacher/dashboard', function () {
    return view('teacher.dashboard');
})->middleware(['auth', 'ensureUserIsTeacher'])->name('teacher.dashboard');

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/subjects', [App\Http\Controllers\Teacher\SubjectController::class, 'index'])->name('subjects.index');
});

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::post('/subjects', [App\Http\Controllers\Teacher\SubjectController::class, 'store'])->name('subjects.store');
});

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/subjects/{subject}', [App\Http\Controllers\Teacher\SubjectController::class, 'show'])->name('subjects.show');
});

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/subjects/{subject}/edit', [App\Http\Controllers\Teacher\SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/subjects/{subject}', [App\Http\Controllers\Teacher\SubjectController::class, 'update'])->name('subjects.update');
});

Route::delete('/subjects/{subject}', [App\Http\Controllers\Teacher\SubjectController::class, 'destroy'])->name('teacher.subjects.destroy');

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/subjects/{subject}/tasks/create', [App\Http\Controllers\Teacher\TaskController::class, 'create'])->name('tasks.create');
    Route::post('/subjects/{subject}/tasks', [App\Http\Controllers\Teacher\TaskController::class, 'store'])->name('tasks.store'); 
});


Route::patch('/subjects/{subject}/restore', [App\Http\Controllers\Teacher\SubjectController::class, 'restore'])->name('teacher.subjects.restore');

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/tasks/{task}', [App\Http\Controllers\Teacher\TaskController::class, 'show'])->name('tasks.show');
});

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/tasks/{task}/edit', [App\Http\Controllers\Teacher\TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [App\Http\Controllers\Teacher\TaskController::class, 'update'])->name('tasks.update');
});

Route::middleware(['auth', 'ensureUserIsTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/solutions/{solution}/evaluate', [App\Http\Controllers\Teacher\SolutionController::class, 'evaluate'])->name('solutions.evaluate');
    Route::post('/solutions/{solution}/evaluate', [App\Http\Controllers\Teacher\SolutionController::class, 'storeEvaluation'])->name('solutions.storeEvaluation');
});







