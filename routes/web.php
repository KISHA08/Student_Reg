<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use App\Models\Phone;



Route::view('/','auth.register')->middleware('guest');
Route::post('/store',[RegisterController::class,'store']);
Route::view('/home', [StudentController::class,'viewForm']);

Route::view('login','auth.login')->middleware('guest')->name('login');
Route::post('authenticate',[LoginController::class,'authenticate']);
Route::get('logout',[LoginController::class,'logout']);


Route::get('/home', [StudentController::class,'viewForm'])->name('home')->middleware('auth');
Route::post('/add-student', [StudentController::class, 'addStudent']);
Route::get('/edit-student/{id}', [StudentController::class, 'edit'])->name('edit-student');
Route::patch('/edit-student/{id}', [StudentController::class, 'update'])->name('update-student');
Route::delete('/delete-student/{id}', [StudentController::class, 'destroy'])->name('delete-student');


Route::get('/add_department', [StudentController::class, 'viewdepartment'])->name('add-department');
Route::post('/add_department', [StudentController::class, 'add_department'])->name('add-department');
Route::get('/edit-department/{id}', [StudentController::class, 'd_edit'])->name('edit-department');
Route::patch('/edit-department/{id}', [StudentController::class, 'd_update'])->name('update-department');
Route::delete('/delete-department/{id}', [StudentController::class, 'd_destroy'])->name('delete-department');

Route::get('/phone', [StudentController::class,'viewPhone'])->name('phone');

Route::get('/add_department/{id}', function($id){
    $students= Student::find($id);
    dd($students->department);  
});

Route::get('/phone/{id}', function($id){
    $phone = Phone::find($id);
    dd($phone->student);
});

// Route::get('forgot-password', [ForgotController::class, 'showForgotPasswordForm'])->name('password.request');
// Route::post('reset-password', [ForgotController::class, 'reset'])->name('password.update');

Route::get('forgot-password', [ForgotController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [ForgotController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ForgotController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotController::class, 'reset'])->name('password.update');

Route::resource('subjects', SubjectController::class);
Route::get('subjects/{id}/delete',[SubjectController::class,'destroy']);

