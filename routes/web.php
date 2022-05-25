<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissingPersonProfileController;
use App\Http\Controllers\FoundPersonProfileController;
use App\Http\Controllers\InfoMissingDateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShareSocialController; 
use App\Http\Controllers\MyReportsController; 
use App\Http\Controllers\FilterOutController; 
use App\Http\Controllers\MailController; 
use App\Http\Controllers\RespondMissingController;
use App\Http\Controllers\RespondFoundController;
use App\Http\Controllers\MeetPersonController;



    // Route::get('/share-social', [ShareSocialController::class,'shareSocial']);
    Route::group(['prefix' => 'user'], function() {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
        Route::get('/report-missing',[App\Http\Controllers\MissingController::class, 'index'])->name('user.report-missing');
        Route::get('/report-found',[App\Http\Controllers\FoundController::class, 'index'])->name('user.report-found');
        Route::get('/filter-out',[FilterOutController::class, 'create'])->name('user.filter-out');
        Route::get('/statistics', [App\Http\Controllers\StatisticsController::class, 'create'])->name('user.statistics');
        Route::get('/help', [App\Http\Controllers\HelpController::class, 'create'])->name('user.help');
        Route::get('/contact-us', [App\Http\Controllers\ContactUsController::class, 'create'])->name('user.contact-us');
        Route::get('/my-reports', [App\Http\Controllers\MyReportsController::class, 'create'])->name('user.my-reports');
     
        Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');

    
    });

    Route::group(['prefix' => 'police_volunteer'], function() {
        Route::group(['middleware' => 'police_volunteer.guest'], function(){
            Route::view('/','police_volunteer.login')->name('police_volunteer.login');
            Route::view('/login','police_volunteer.login')->name('police_volunteer.login');
            Route::post('/login',[App\Http\Controllers\PoliceVolunteerController::class, 'authenticate'])->name('police_volunteer.auth');
        });
        
        Route::group(['middleware' => 'police_volunteer.auth'], function(){
            Route::get('/index',[App\Http\Controllers\PolicevolunteerController::class, 'index'])->name('police_volunteer.index');

            Route::resource('list-of-missing-person', MissingPersonProfileController::class);
            Route::resource('list-of-found-person', FoundPersonProfileController::class);
            Route::resource('respond-missing',RespondMissingController::class);
            Route::resource('respond-found',RespondFoundController::class);
            Route::resource('meet-person',MeetPersonController::class);
            Route::resource('my-reports',MyReportsController::class);
            Route::resource('filter-out',FilterOutController::class);


            Route::get('/send-mail', [App\Http\Controllers\MailController::class, 'sendMail']);
            Route::get('/help', [App\Http\Controllers\HelpController::class, 'index'])->name('police_volunteer.help');
            Route::get('/contact-us', [App\Http\Controllers\ContactUsController::class, 'index'])->name('police_volunteer.contact-us');
            Route::get('/statistics', [App\Http\Controllers\StatisticsController::class, 'index'])->name('police_volunteer.statistics');
        


            Route::post('/report-missing-person',[App\Http\Controllers\PoliceMissingPersonController::class, 'store'])->name('police_volunteer_missing.store');
            Route::post('/info_missing',[App\Http\Controllers\InfoPoliceMissingDateController::class, 'store'])->name('info_police_missing_date.store');
            Route::get('/report-missing',[App\Http\Controllers\PoliceMissingPersonController::class, 'create'])->name('police_volunteer.report-missing');
            Route::get('/report-with-suggestion',[App\Http\Controllers\InfoPoliceMissingDateController::class, 'create'])->name('police_volunteer.report-with-suggestion');

            Route::post('/report-found-person',[App\Http\Controllers\PoliceFoundPersonController::class, 'store'])->name('police_volunteer_found.store');
            Route::post('/info_found',[App\Http\Controllers\InfoPoliceFoundDateController::class, 'store'])->name('info_police_found_date.store');
            Route::get('/report-found',[App\Http\Controllers\PoliceFoundPersonController::class, 'create'])->name('police_volunteer.report-found');
            Route::get('/report-with-suggestion-found',[App\Http\Controllers\InfoPoliceFoundDateController::class, 'create'])->name('police_volunteer.report-found-date');

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
            Route::post('/add-police-volunteer',[App\Http\Controllers\PoliceVolunteerController::class, 'store'])->name('police_volunteer.store');
            Route::get('/add-police-volunteer',[App\Http\Controllers\PoliceVolunteerController::class, 'add_police_volunteer'])->name('admin.add_police_volunteer');
            Route::get('/manage-mp-reports',[App\Http\Controllers\MissingController::class, 'manage_mp_reports'])->name('admin.manage_mp_reports');
            Route::get('/manage-fp-reports',[App\Http\Controllers\FoundController::class, 'manage_fp_reports'])->name('admin.manage_fp_reports');
            Route::get('/manage-meet-persons',[App\Http\Controllers\MeetPersonController::class, 'manage_meet_persons'])->name('admin.manage_meet_persons');
            Route::get('/manage-users',[App\Http\Controllers\HomeController::class, 'manage_users'])->name('admin.manage_users');
            Route::get('/manage-police-volunteer',[App\Http\Controllers\PoliceVolunteerController::class, 'manage_police_volunteer'])->name('admin.manage_police_volunteer');
            Route::get('/validate-mp-pending',[App\Http\Controllers\MissingController::class, 'validate_mp_pending'])->name('admin.validate_mp_pending');
            Route::get('/validate-fp-pending',[App\Http\Controllers\FoundController::class, 'validate_fp_pending'])->name('admin.validate_fp_pending');
            Route::get('/index',[App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.index');
            Route::get('/dashboard',[App\Http\Controllers\AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

        });
    });

    require __DIR__.'/auth.php';

    Auth::routes();
