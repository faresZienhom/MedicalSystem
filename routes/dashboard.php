<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    DoctorController,
    AdminController,
    ExaminationController,
    ProfileController,
    SpecialtyController,
    PatientController,
    SettingController,
    MessageController,
};
// use App\Http\Controllers\PatientController;
use App\Http\Controllers\SearchController;

Route::middleware(['auth', 'IsAdminOrDoctor'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/search/{name}/{key}', [SearchController::class, 'result'])->name('result');

    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('/',  'profile')->name('profile');
        Route::patch('/update-image', 'update_image')->name('update-image');
        Route::patch('/update-password', 'update_password')->name('update-password');
    });

    Route::controller(PatientController::class)->prefix('patients')->name('patients.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{patient}/edit', 'edit')->name('edit');
        Route::put('/{patient}', 'update')->name('update');
        Route::get('/{patient}', 'show')->name('show');
        Route::delete('/{patient}', 'destroy')->name('destroy');
    });

    Route::controller(ExaminationController::class)->prefix('examinations')->name('examinations.')->group(function () {
        Route::middleware(['IsDoctor'])->group(function () {
            Route::get('/create/{patient}', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{examination}/edit', 'edit')->name('edit');
            Route::put('/{examination}', 'update')->name('update');
        });
        Route::get('/', 'getAllExaminations')->name('get_all_examinations');
        Route::get('/patient/{patient}', 'index')->name('index');
        Route::get('/{examination}', 'show')->name('show');
        Route::delete('/{examination}', 'destroy')->name('destroy');
        Route::get('/download/{examination}', 'download')->name('download');
        Route::get('/downloadPDF/{examination}', 'downloadPDF')->name('downloadPDF');
    });
});

Route::middleware(['auth', 'IsAdmin'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/filter/', [SearchController::class, 'filter'])->name('filter');

    Route::controller(MessageController::class)->prefix('messages')->name('messages.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{message}', 'show')->name('show');
        Route::delete('/{message}', 'destroy')->name('destroy');
        // Route::post('/messages', 'store');
    });

    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
        Route::get('/',  'index')->name('index');
        Route::patch('/update/{setting}', 'update')->name('update');
    });

    Route::controller(SpecialtyController::class)->prefix('specialties')->name('specialty.')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{specialty}/edit', 'edit')->name('edit');
        Route::put('/{specialty}', 'update')->name('update');
        Route::delete('/{specialty}', 'destroy')->name('destroy');
    });

    Route::controller(DoctorController::class)->prefix('doctors')->name('doctors.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{doctor}/edit', 'edit')->name('edit');
        Route::put('/{doctor}', 'update')->name('update');
        Route::get('/{doctor}', 'show')->name('show');
        Route::delete('/{doctor}', 'destroy')->name('destroy');
    });

    Route::controller(AdminController::class)->prefix('admins')->name('admins.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::put('/{user}', 'update')->name('update');
        // Route::get('/{user}', 'show')->name('show');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });
});
