<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ParentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::resource('classes', ClassController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('classes', ClassController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/teacher/classes', [ClassController::class, 'index'])->name('teacher.classes');
    Route::get('/teacher/activities', [ActivityController::class, 'index'])->name('teacher.activities');
    Route::get('/teacher/create_activity', [ActivityController::class, 'create'])->name('teacher.create_activity');
    Route::get('/teacher/list_activities', [ActivityController::class, 'index'])->name('teacher.list_activities');
    Route::resource('activities', ActivityController::class);
});

Route::middleware(['auth'])->group(function () {
Route::get('parent/dashboard', [ParentController::class, 'dashboard'])->name('parent.dashboard');
Route::get('parent/activities', [ParentController::class, 'index'])->name('parent.activities');
Route::post('parent/join-activity/{id}', [ParentController::class, 'joinActivity'])->name('parent.join-activity');
Route::get('parent/activities-joined', [ParentController::class, 'activitiesJoined'])->name('parent.activities-joined');
Route::delete('parent/delete-joined-activity/{id}', [ParentController::class, 'deleteJoinedActivity'])->name('parent.delete-joined-activity');
});

Route::resource('activities', ActivityController::class);
Route::resource('classes', ClassController::class);
