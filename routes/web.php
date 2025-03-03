<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FeeSettingsController;
use App\Http\Controllers\Auth\LogoutController;
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
    return view('auth.login');
});
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('preventCache');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::resource('users', 'App\Http\Controllers\UsersController');
    Route::resource('courses', 'App\Http\Controllers\CourseController');
    //Route::resource('settings', 'App\Http\Controllers\SettingsController');
    Route::resource('enquiry', 'App\Http\Controllers\EnquiryController');
    Route::resource('enquiry_followup', 'App\Http\Controllers\EnquiryFollowupController');
    Route::resource('admission', 'App\Http\Controllers\AdmissionController');
    Route::resource('fees', 'App\Http\Controllers\FeesController');
    Route::resource('feesettings', 'App\Http\Controllers\FeeSettingController');
    Route::get('/feesettings/{id}/show', 'FeeSettingsController@show')->name('feesettings.show');
    Route::get('/feesettings/{id}/edit', 'FeeSettingController@edit');
    Route::post('/feesettings/store', [App\Http\Controllers\FeeSettingController::class, 'store'])->name('feesettings.store');
    Route::post('/fees/generate-receipt', [App\Http\Controllers\FeesController::class, 'generateReceipt'])->name('fees.generate-receipt');
    Route::get('/get-batch-data', [App\Http\Controllers\FeesController::class, 'getBatchData'])->name('get.batch.data');
    Route::get('/get-fee-details/{id}', [App\Http\Controllers\FeesController::class, 'getFeeDetails']);
    Route::get('/admission/enquiry/{search}/{value}', 'App\Http\Controllers\AdmissionController@enquiry')->name('admission.enquiry');
    Route::get('/admissions', [App\Http\Controllers\AdmissionController::class, 'index'])->name('admissions.index');
    Route::get('/fees/receipt/{id}', [App\Http\Controllers\FeesController::class, 'receipt'])->name('fees.receipt');
    Route::get('/get-categories', [App\Http\Controllers\AdmissionController::class, 'getCategories'])->name('get.categories');
    Route::get('/get-batch-data', [App\Http\Controllers\AdmissionController::class, 'getBatchData'])->name('get.batch.data');

    
    Route::get('/get-course-data/{academicYear}', [App\Http\Controllers\FeeSettingController::class, 'getCourseData']);
    

    
    Route::get('/get-courses/{academicYear}', [App\Http\Controllers\FeeSettingController::class, 'getCourseData']);
    Route::get('/get-course-filters/{academicYear}/{category}', [App\Http\Controllers\FeeSettingController::class, 'getCourseFilters']);
    Route::get('/get-courses/{academicYear}/{category}/{shift}/{medium}', [App\Http\Controllers\FeeSettingController::class, 'getFilteredCourses']);
    

});
