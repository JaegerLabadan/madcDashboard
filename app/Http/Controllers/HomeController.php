<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model Imports
use App\Appointments;
use App\Records;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = Appointments::where('notification_status', 'unread')->get();
        $pending = Appointments::where('appointment_status', 'pending')->get();
        $followup = Appointments::where('appointment_status', 'follow-up')->get();
        return view('home')->with([

            'notifications' => $notifications,
            'pending' => $pending,
            'follow' => $followup

        ]);
    }

    public function showNewNotifications()
    {
        $current = date('Y-m-d');
        $notification = Appointments::where('notification_status', 'unread')
                                    ->where('appointment_date', $current)
                                    ->paginate(10);
        return view('notifications/new_notifications')->with('notification', $notification);

    }

    public function showUnreadNotifications()
    {
        $notification = Appointments::where('notification_status', 'unread')
                                    ->paginate(10);
        return view('notifications/unread_notifications')->with('notification', $notification);

    }

    public function showPendingAppointments()
    {

        $appointments = Appointments::where('appointment_status', 'pending')
                                    ->paginate(10);
        return view('appointments/pending')->with('appointments', $appointments);

    }

    public function showFollowUpPendingAppointments()
    {

        $appointments = Appointments::where('appointment_status', 'follow-up')
                                    ->paginate(10);
        return view('appointments/pending')->with('appointments', $appointments);

    }

    public function showAppointmentsToday()
    {

        $current = date('Y-m-d');
        $appointments = Appointments::where('appointment_date', $current)
                                    ->paginate(10);
        return view('appointments/today')->with('appointments', $appointments);

    }

    public function showAppointmentsThisMonth()
    {

        $year = date('Y');
        $month = date('m');
        $appointments = Appointments::whereYear('appointment_date', $year)
                                    ->whereMonth('appointment_date', $month)
                                    ->paginate(10);
        return view('appointments/month')->with('appointments', $appointments);

    }

    public function getRecords(){

        $data = Records::whereMonth('record_date', date('m'))->get();
        if(!$data->isEmpty()){

            return $data;

        }
        else{

            return "NO APPOINTMENTS";

        }

    }

    public function getAppointmentsForThisDate(Request $request){

        $date = $request->get('date');
        $data = Appointments::where('appointment_date', $date)->get();

        if(!$data->isEmpty()){

            return $data;

        }
        else{

            return "EMPTY";

        }

    }
}
