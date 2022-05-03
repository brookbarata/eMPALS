<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissingController;
use App\Http\Controllers\InfoMissingDateController;
use App\Http\Controllers\FoundController;
use App\Http\Controllers\HomeController;




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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('report-missing', MissingController::class);
    Route::resource('report-found', FoundController::class);
    Route::resource('report-with-suggestion', InfoMissingDateController::class);
    // Route::resource('report-with-suggestion', InfoFoundDateController::class);

     
    Route::get('/filter-out', function () {
        return view('/filter.index');
    });


    Route::get('/statistics', function () {
        return view('/statistics.index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    require __DIR__.'/auth.php';

    Auth::routes();


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'show']);
    Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');

    Route::group(['prefix' => 'police_volunteer'], function() {
        Route::group(['middleware' => 'police_volunteer.guest'], function(){
            Route::view('/','police_volunteer.login')->name('police_volunteer.login');
            Route::view('/login','police_volunteer.login')->name('police_volunteer.login');
            Route::post('/login',[App\Http\Controllers\PoliceVolunteerController::class, 'authenticate'])->name('police_volunteer.auth');
        });
        
        Route::group(['middleware' => 'police_volunteer.auth'], function(){
            Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'dashboard'])->name('police_volunteer.dashboard');
            Route::get('/index',[App\Http\Controllers\DashboardController::class, 'index'])->name('police_volunteer.index');
            Route::post('/police_volunteer_missing',[App\Http\Controllers\PoliceMissingPersonController::class, 'store'])->name('police_volunteer_missing.store');
            Route::post('/store',[App\Http\Controllers\InfoPoliceMissingDateController::class, 'store'])->name('info_missing_date.store');
            Route::get('/report-missing',[App\Http\Controllers\PoliceMissingPersonController::class, 'report_missing'])->name('police_volunteer.report-missing');
            Route::get('/report-with-suggestion',[App\Http\Controllers\InfoMissingDateController::class, 'report_with_suggestion'])->name('police_volunteer.report-with-suggestion');
            Route::get('/logout', [App\Http\Controllers\PoliceVolunteerController::class, 'logout'])->name('police_volunteer.logout');

        });
    });

    Route::group(['prefix' => 'admin'], function() {
        Route::group(['middleware' => 'admin.guest'], function(){
            Route::view('/','admin.login')->name('admin.login');
            Route::view('/login','admin.login')->name('admin.login');
            Route::post('/login',[App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.auth');
        });
        
        Route::group(['middleware' => 'admin.auth'], function(){
            Route::post('/store',[App\Http\Controllers\PoliceVolunteerController::class, 'store'])->name('police_volunteer.store');
            Route::get('/add_police_volunteer',[App\Http\Controllers\PoliceVolunteerController::class, 'add_police_volunteer'])->name('admin.add_police_volunteer');
            Route::get('/manage_mp_reports',[App\Http\Controllers\MissingController::class, 'manage_mp_reports'])->name('admin.manage_mp_reports');
            Route::get('/manage_fp_reports',[App\Http\Controllers\FoundController::class, 'manage_fp_reports'])->name('admin.manage_fp_reports');
            Route::get('/manage_meet_persons',[App\Http\Controllers\MeetPersonController::class, 'manage_meet_persons'])->name('admin.manage_meet_persons');
            Route::get('/manage_users',[App\Http\Controllers\HomeController::class, 'manage_users'])->name('admin.manage_users');
            Route::get('/manage_police_volunteer',[App\Http\Controllers\PoliceVolunteerController::class, 'manage_police_volunteer'])->name('admin.manage_police_volunteer');
            Route::get('/validate_mp_pending',[App\Http\Controllers\MissingController::class, 'validate_mp_pending'])->name('admin.validate_mp_pending');
            Route::get('/validate_fp_pending',[App\Http\Controllers\FoundController::class, 'validate_fp_pending'])->name('admin.validate_fp_pending');
            Route::get('/index',[App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.index');
            Route::get('/dashboard',[App\Http\Controllers\AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

        });
    });
