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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/new', 'HomeController@showNewNotifications')->name('new_notifs');
Route::get('/unread', 'HomeController@showUnreadNotifications')->name('unread_notifs');
Route::get('/all', 'HomeController@showAllNotifications')->name('all_notifs');

// AJAX Routes
Route::get('check_for_notifications', 'NotificationsController@checkForNotifications')->name('ajax_check_for_notifications');
Route::get('calendar_appointments', 'HomeController@getRecords')->name('ajax_get_records');
Route::get('get_appointments', 'HomeController@getAppointmentsForThisDate')->name('ajax_appointments_for_this_date');