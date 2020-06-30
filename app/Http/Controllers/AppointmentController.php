<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model Imports
use App\Appointments;
use App\Records;

class AppointmentController extends Controller
{
    public function approveAppointment(Request $request)
    {

        $date = $request->get('date');
        $start = $request->get('start');
        $end = $request->get('end');
        $slot = $request->get('slot');
        $check = Appointments::where('appointment_date', $date)
                            ->where('appointment_time_start', $start)
                            ->where('appointment_time_end', $end)
                            ->where('slot_no', $slot)
                            ->get();

        if(!$check->isEmpty()){

            $temp = Appointments::where('appointment_id', $check[0]->appointment_id)
                                ->update(['appointment_status' => 'approved']);
                             
            return "SUCCESS";

        }
        else{

            return "FAILED";

        }

    }

    public function deleteAppointment(Request $request)
    {

        $date = $request->get('date');
        $start = $request->get('start');
        $end = $request->get('end');
        $slot = $request->get('slot');
        $check = Appointments::where('appointment_date', $date)
                            ->where('appointment_time_start', $start)
                            ->where('appointment_time_end', $end)
                            ->where('slot_no', $slot)
                            ->get();

        if(!$check->isEmpty()){

            $temp = Appointments::where('appointment_id', $check[0]->appointment_id)
                                ->delete();

            $record = Records::where('record_date', $check[0]->appointment_date)->get();
            $new = Records::where('id', $record[0]->id)
                            ->update(['number_of_appointments' => $record[0]->number_of_appointments - 1]);
            return "SUCCESS";

        }
        else{

            return "FAILED";

        }

    }

    public function viewAppointment(Request $request)
    {

        $date = $request->get('date');
        $start = $request->get('start');
        $end = $request->get('end');
        $slot = $request->get('slot');
        $check = Appointments::where('appointment_date', $date)
                            ->where('appointment_time_start', $start)
                            ->where('appointment_time_end', $end)
                            ->where('slot_no', $slot)
                            ->get();
        if(!$check->isEmpty()){

            return $check;

        }
        else{

            return "FAILED";

        }

    }


    public function addCommentToAppointment(Request $request){

        $id = $request->get('id');
        $comments = $request->get('comments');

        $check = Appointments::where('appointment_id', $id)->get();

        if(!$check->isEmpty()){

            $data = Appointments::where('appointment_id', $id)
                                ->update([
                                    'appointment_status' => 'follow-up',
                                    'comments' => $comments
                                ]);

            return "SUCCESS";

        }
        else{
            
            return "FAILED";

        }

    }
}
