<?php

use App\Http\Controllers\Konfigurasi\NavigationController;
use App\Http\Controllers\Konfigurasi\PermissionController;
use App\Http\Controllers\Konfigurasi\RoleController;
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
    return redirect()->route('login');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('user/profile');
    })->name('profile');


    //konfigurasi
    Route::controller(RoleController::class)->group(function () {
        Route::get('konfigurasi/roles', 'index')->name('roles.index');
        Route::get('konfigurasi/roles/create', 'create')->name('roles.create');
        Route::get('konfigurasi/roles/store', 'store')->name('roles.store');
        Route::get('konfigurasi/roles/view/{id}', 'view')->name('roles.view');
        Route::get('konfigurasi/roles/addPermission', 'addPermission')->name('roles.addPermission');
        Route::get('konfigurasi/roles/update/{id}', 'update')->name('roles.update');
        Route::get('konfigurasi/roles/destroy/{id}', 'destroy')->name('roles.destroy');
        Route::get('konfigurasi/roles/removePermission/{id}/{role_id}', 'delete')->name('roles.delete');
    });

    Route::controller(NavigationController::class)->group(function () {
        Route::get('konfigurasi/navigasi', 'index')->name('navigasi.index');
        Route::get('konfigurasi/navigasi/create', 'create')->name('navigasi.create');
        Route::get('konfigurasi/navigasi/store', 'store')->name('navigasi.store');
        Route::get('konfigurasi/navigasi/update/{id}', 'update')->name('navigasi.update');
        Route::get('konfigurasi/navigasi/destroy/{id}', 'destroy')->name('navigasi.destroy');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('konfigurasi/permission', 'index')->name('permission.index');
        Route::get('konfigurasi/permission/create', 'create')->name('permission.create');
        Route::get('konfigurasi/permission/store', 'store')->name('permission.store');
        Route::get('konfigurasi/permission/update/{id}', 'update')->name('permission.update');
        Route::get('konfigurasi/permission/destroy/{id}', 'destroy')->name('permission.destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile',  'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});


require __DIR__ . '/auth.php';
