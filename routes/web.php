<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [CourseController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/course', [CourseController::class, 'history'])->name('course');
    Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::get('/course/detail/{id}', [CourseController::class, 'show'])->name('course.detail');
    Route::put('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::get('/course/destroy /{id}', [CourseController::class, 'destroy'])->name('course.destroy');

});

    




require __DIR__.'/auth.php';
