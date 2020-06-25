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
        return view('home')->with([

            'notifications' => $notifications

        ]);
    }

    public function showNewNotifications()
    {

        return view('notifications/new_notifications');

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
}
