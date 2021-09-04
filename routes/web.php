<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' =>[
    'auth:sanctum',
    'verified',
    'accessrole',
]],function () {

    Route::get('/dashboard',function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/courses',function () {
        return view('admin.courses');
    })->name('courses');

    Route::get('/courses/{modelId}',
        \App\Http\Livewire\CourseShow::class
    )->name('course-show');

    Route::get('/users',function () {
        return view('admin.users');
    })->name('users');

    Route::get('/user-permissions',function () {
        return view('admin.user-permissions');
    })->name('user-permissions');

    Route::get('/media',function () {
        return view('admin.medias');
    })->name('medias');

    Route::get('/messenger',function () {
        return view('admin.messenger');
    })->name('messenger');

});

Route::get('/', function () {
    return view('welcome');
});



