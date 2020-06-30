@extends('layouts.dashboard')

@section('content')

{{-- end of nav bar --}}
<div class="container-fluid p-0">
    {{-- date-time-notification --}}
    <div class="row dashboard-date-time">
      <div class="col-2"></div>
      <div class="col-8">
        <span>
          <h3>june 1 1995</h3>
        </span>
        <span>
          <h2>6:37 PM</h2>
        </span>
        <span class="notif">
          <h2>notifications 
        </span>
      </div>
      <div class="col-2"></div>
    </div>
    {{-- notification --}}
    <div class="row align-items-center dashboard-notification" style="margin: 0;">
      <div class="col-2"></div>
      <div class="col-8">
        <table class="table table-borderless notif-table">
          <tbody>
            @if(count($notifications) != 0)
              @foreach($notifications as $data)
              <tr>
                <td style="width: 4vw;">
                  <?php
                  
                    $date = $data->appointment_date;
                    $current = Date('Y-m-d');
                    if($date == $current){

                      echo "<span class='new-notif'>new</span>";

                    }
                    else{

                    }

                  ?>
                </td>
                <td style="width: 15vw">{{ $data->appointment_service }}</td>
                <td style="width: 7vw">{{ $data->appointment_time_start }}</td>
                <td class="text-center">
                  <?php

                    $current = $data->appointment_date;
                    $new = Date('F d Y', strtotime($current));
                    echo $new;
                  
                  ?>
                </td>
                <td>{{ $data->appointment_customer }}</td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        <div class="row">
          <div class="col-md-4 text-center">
            {{-- <button id="sellAllBtn" type="button" class="btn btn-warning custom-btn"><a href="#">See all</a></button> --}}
          </div>
          <div class="col-md-4 text-center">
            <form method="POST" action="{{ route('mark_as_read') }}">
              @csrf
              <button id="markAllBtn" type="submit" class="btn btn-warning custom-btn" style="color: white;">Mark all as read</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- end of notification --}}
    {{-- pending appointment --}}
    <div class="row align-items-center dashboard-appointments" style="margin: 2vw 0 0 0;">
      <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="appointmentModalTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="appointmentModalContent">
              </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <div class="col-2"></div>
        <div class="col-9 pending-table">
          <table class="table table-borderless">
            {{-- pending --}}
            <tbody class="pending">
              <tr class="pending-header"><td colspan="7"><h5>Pending Appointments</h5></td></tr>
              @foreach($pending as $data)
              <tr>
                <td style="width: 3vw;margin-left:5vw;">
                  <?php

                  $current = $data->appointment_date;
                  $new = Date('F d Y', strtotime($current));
                  echo $new;
              
                  ?>
                </td>
                <td style="width: 4vw">{{ $data->appointment_time_start }} - {{ $data->appointment_time_end }}</td>
                <td style="width: 7vw">{{ $data->appointment_service }}</td>
                <td style="width: 5vw">{{ $data->appointment_customer }}</td>
                <td style="width: 3vw">{{ $data->phone }}</td>
                <td style="width: 4vw;text-align: center;vertical-align: middle;">
                  <i class="appointment-form fa fa-check actions pr-2 pl-2" data-date="{{ $data->appointment_date }}" data-start="{{ $data->appointment_time_start }}" data-end="{{ $data->appointment_time_end }}" data-slot="{{ $data->slot_no }}"></i>
                  <i class="delete-form fa fa-ban actions pr-2 pl-2" data-date="{{ $data->appointment_date }}" data-start="{{ $data->appointment_time_start }}" data-end="{{ $data->appointment_time_end }}" data-slot="{{ $data->slot_no }}"></i>
                  <i class="view-form fas fa-search actions pr-2 pl-2" data-date="{{ $data->appointment_date }}" data-start="{{ $data->appointment_time_start }}" data-end="{{ $data->appointment_time_end }}" data-slot="{{ $data->slot_no }}"></i>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-1"></div>
      </div>

      <div class="row align-items-center dashboard-appointments" style="margin: 2vw 0 0 0;">
        <div class="col-2"></div>
        <div class="col-9 pending-table">
          <table class="table table-borderless">
            {{-- pending --}}
            <tbody class="pending">
              <tr class="pending-header"><td colspan="7"><h5 style="color:#da5a01">For follow-up</h5></td></tr>
              @foreach($follow as $data)
              <tr>
                <td style="width: 3vw;margin-left:5vw;">
                  <?php

                  $current = $data->appointment_date;
                  $new = Date('F d Y', strtotime($current));
                  echo $new;
              
                  ?>
                </td>
                <td style="width: 4vw">{{ $data->appointment_time_start }} - {{ $data->appointment_time_end }}</td>
                <td style="width: 7vw">{{ $data->appointment_service }}</td>
                <td style="width: 5vw">{{ $data->appointment_customer }}</td>
                <td style="width: 3vw">{{ $data->phone }}</td>
                <td style="width: 4vw;text-align: center;vertical-align: middle;">
                  <i class="appointment-form fa fa-check actions pr-2 pl-2" data-date="{{ $data->appointment_date }}" data-start="{{ $data->appointment_time_start }}" data-end="{{ $data->appointment_time_end }}" data-slot="{{ $data->slot_no }}"></i>
                  <i class="delete-form fa fa-ban actions pr-2 pl-2" data-date="{{ $data->appointment_date }}" data-start="{{ $data->appointment_time_start }}" data-end="{{ $data->appointment_time_end }}" data-slot="{{ $data->slot_no }}"></i>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-1"></div>
    </div>
    {{-- end of pending appointment --}}
    {{-- calendar appointment for today --}}
    <div class="modal fade bd-example-modal-lg" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content container" id="calendarModalContent">
          <div class="text-center" id="dateSlot">
          </div>
          <div id="slot1">
            <h2>Slot 1</h2>
          </div>
          <div id="slot2">
            <h2>Slot 2</h2>
          </div>
          <div id="slot3">
            <h2>Slot 3</h2>
          </div>
        </div>
      </div>
    </div>


    <div class="row today-appointment" style="margin-top: 2vw">
      <div class="col-2"></div>
      <div class="col-8">
        <div id='calendar'>
          <div class="fc-center"></div>
        </div>
        <div class="col-2"></div>
      </div>
      {{-- end of calendar appointment for today --}}
    </div>

@endsection