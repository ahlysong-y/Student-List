<?php

use Illuminate\Support\Facades\Route;
// ១. បន្ថែមការ Use Controller របស់សិស្សនៅត្រង់នេះ
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AddressController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/get-districts/{province_id}', [AddressController::class, 'getDistricts']);
Route::get('/get-communes/{district_id}', [AddressController::class, 'getCommunes']);
Route::get('/get-villages/{commune_id}', [AddressController::class, 'getVillages']);