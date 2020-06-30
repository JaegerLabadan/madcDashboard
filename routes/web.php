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

Route::get('/pending', 'HomeController@showPendingAppointments')->name('pending_appointments');
Route::get('/followup', 'HomeController@showFollowUpPendingAppointments')->name('followup_appointments');
Route::get('/today', 'HomeController@showAppointmentsToday')->name('appointments_today');
Route::get('/month', 'HomeController@showAppointmentsThisMonth')->name('appointments_this_month');

Route::post('/mark_as_read', 'NotificationsController@markAllAsRead')->name('mark_as_read');

// AJAX Routes
Route::get('check_for_notifications', 'NotificationsController@checkForNotifications')->name('ajax_check_for_notifications');
Route::get('calendar_appointments', 'HomeController@getRecords')->name('ajax_get_records');
Route::get('get_appointments', 'HomeController@getAppointmentsForThisDate')->name('ajax_appointments_for_this_date');
Route::get('get_specific_appointments', 'AppointmentController@viewAppointment')->name('ajax_view_appointments');

Route::post('approve_appointment', 'AppointmentController@approveAppointment')->name('ajax_approve_appointment');
Route::post('delete_appointment', 'AppointmentController@deleteAppointment')->name('ajax_delete_appointment');
Route::post('add_comment', 'AppointmentController@addCommentToAppointment')->name('ajax_add_comment');