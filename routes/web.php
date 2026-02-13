<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AppointmentsController;


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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');
    Route::post('/therapistdelete', [AdminController::class, 'therapistdelete'])
        ->name('admin.therapistdelete');
    Route::post('/patientdelete', [AdminController::class, 'patientdelete'])
        ->name('admin.patientdelete');    
        Route::post('/therapistapprove', [AdminController::class, 'therapistapprove'])
        ->name('admin.therapistapprove');    
        
});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient', [PatientController::class, 'index'])
        ->name('patient.dashboard');
    
    Route::get('/patient-book/{id}', [PatientController::class, 'book'])
        ->name('patient.book');    

    Route::post('/appointments', [AppointmentsController::class, 'store'])
        ->name('appointments.store');
    
    
    });

Route::middleware(['auth', 'role:therapist'])->group(function () {
    Route::get('/therapist', [TherapistController::class, 'index'])
        ->name('therapist.dashboard');
    Route::post('/appointmentsmodify', [AppointmentsController::class, 'modify'])
        ->name('appointments.modify');

    });

Route::middleware(['auth'])->group(function () {
    // Route::get('/chat', [ChatController::class, 'index'])
    //     ->name('chat.chat');
    Route::get('/chat/{therapist}/{patient}', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/messages/{therapist}/{patient}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
;
});
