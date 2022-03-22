<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home.index');
Route::get('aboutus', [\App\Http\Controllers\Frontend\HomeController::class, 'about'])->name('home.aboutus');
Route::get('services', [\App\Http\Controllers\Frontend\HomeController::class, 'service'])->name('home.services');
Route::get('case', [\App\Http\Controllers\Frontend\HomeController::class, 'case'])->name('home.case');
Route::get('blogs', [\App\Http\Controllers\Frontend\HomeController::class, 'blog'])->name('home.blog');
Route::get('contacts', [\App\Http\Controllers\Frontend\HomeController::class, 'contact'])->name('home.contact');
Route::get('advisor/detail/{id}', [\App\Http\Controllers\Frontend\HomeController::class, 'advisorDetail'])->name('advisor.detail');
Route::get('category/case/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'casesAsCategory'])->name('category.cases');
Route::get('blog/details/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('services/details/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'serviceDetails'])->name('service.details');
Route::get('case/details/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'caseDetails'])->name('case.details');
Route::get('about/details/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'aboutDetails'])->name('about.details');
Route::post('user/feedback', [\App\Http\Controllers\Frontend\HomeController::class, 'userFeedback'])->name('user.appointment');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('admin/profile', [\App\Http\Controllers\AdminController::class, 'showProfilePage'])->name('admin.profile');
    Route::post('admin/profile', [\App\Http\Controllers\AdminController::class, 'updateProfile'])->name('admin.update.profile');
    Route::get('admin/password', [\App\Http\Controllers\AdminController::class, 'changePasswordPage'])->name('admin.password');
    Route::post('admin/password', [\App\Http\Controllers\AdminController::class, 'changePassword'])->name('admin.update.password');
    Route::get('users/appointment', [\App\Http\Controllers\AdminController::class, 'usersAppointment'])->name('users.appointment.list');
    Route::get('user/appointment/detail/{id}', [\App\Http\Controllers\AdminController::class, 'userAppointmentDetail'])->name('user.appointment.detail');
    Route::delete('user/appointment/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteUserAppointment'])->name('user.appointment.delete');
});
