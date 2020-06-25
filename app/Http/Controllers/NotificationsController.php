<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model Imports
use App\Appointments;

class NotificationsController extends Controller
{
    
    public function checkForNotifications(Request $request){

        $returnable = array();
        $currentDate = date("Y-m-d");
        $new = Appointments::where('notification_status', 'unread')
                           ->where('appointment_date', $currentDate)
                           ->count();
        $unread = Appointments::where('notification_status', 'unread')->count();
        array_push($returnable, $new, $unread);
        return $returnable;

    }

}
