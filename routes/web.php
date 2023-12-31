<?php

use App\Http\Controllers\admin\AdminController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('Admin.dashboard');
    Route::get('/register-employee', [AdminController::class, 'register_form'])->name('register_employee');
    Route::post('/employee-store', [AdminController::class, 'store'])->name('employee_store');
});

Route::group(['middleware' => ['auth', 'role:HR']], function () {
    Route::get('hr/dashboard', [AdminController::class, 'index'])->name('HR.dashboard');
    Route::get('/register-employee', [AdminController::class, 'register_form'])->name('register_employee');
    Route::post('/employee-store', [AdminController::class, 'store'])->name('employee_store');
});


require __DIR__.'/auth.php';
