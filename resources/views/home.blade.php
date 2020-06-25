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
            <button id="sellAllBtn" type="button" class="btn btn-warning custom-btn">See all</button>
          </div>
          <div class="col-md-4 text-center">
            <button id="markAllBtn" type="button" class="btn btn-warning custom-btn">Mark all as read</button>
          </div>
        </div>
      </div>
    </div>

    {{-- end of notification --}}
    {{-- pending appointment --}}
    <div class="row align-items-center dashboard-appointments" style="margin: 2vw 0 0 0;">
      <div class="col-2"></div>
      <div class="col-8 pending-table">
        <table class="table table-borderless">
          {{-- pending --}}
          <tbody class="pending">
            <tr class="pending-header">
              <td colspan="7">
                <h5>pending appointments</h5>
              </td>
            </tr>
            <tr>
              <td class="pending-checkbox"><span style="margin-left:3vw;"><input type="checkbox" name="" id=""></span></td>
              <td style="width: 5vw">june 5 2020</td>
              <td style="width: 5vw">6:03 PM</td>
              <td style="width: 5vw">cleaning</td>
              <td style="width: 7vw">jessie valeza </td>
              <td style="width: 5vw">0906-055-5365</td>
              <td style="width: 9vw;text-align: center;vertical-align: middle;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-comment"></i>
              </td>
            </tr>
            <tr>
              <td class="pending-checkbox"><span style="margin-left:3vw;"><input type="checkbox" name="" id=""></span></td>
              <td style="width: 5vw">june 5 2020</td>
              <td style="width: 5vw">6:03 PM</td>
              <td style="width: 5vw">cleaning</td>
              <td style="width: 7vw">jessie valeza </td>
              <td style="width: 5vw">0906-055-5365</td>
              <td style="width: 9vw;text-align: center;vertical-align: middle;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-comment"></i>
              </td>
            </tr>
          </tbody>
          {{-- follow-up --}}
          <tbody class="follow-up"  style="display: none;">
            <tr>
              <td colspan="7" style="margin-top:5vw;">
                <h5 style="color:#da5a01;font-size: 2vw;margin: 3vw 0 1.5vw 4vw;">for follow up</h5>
              </td>
            </tr>
            <tr>
              <td class="pending-checkbox"><span style="margin-left:3vw;"><input type="checkbox" name="" id=""></span></td>
              <td style="width: 5vw">june 5 2020</td>
              <td style="width: 5vw">6:03 PM</td>
              <td style="width: 5vw">cleaning</td>
              <td style="width: 7vw">jessie valeza </td>
              <td style="width: 5vw">0906-055-5365</td>
              <td style="width: 9vw;text-align: center;vertical-align: middle;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-comment"></i>
              </td>
            </tr>
            <tr>
              <td class="pending-checkbox"><span style="margin-left:3vw;"><input type="checkbox" name="" id=""></span></td>
              <td style="width: 5vw">june 5 2020</td>
              <td style="width: 5vw">6:03 PM</td>
              <td style="width: 5vw">cleaning</td>
              <td style="width: 7vw">jessie valeza </td>
              <td style="width: 5vw">0906-055-5365</td>
              <td style="width: 9vw;text-align: center;vertical-align: middle;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-comment"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-2"></div>
    </div>
    {{-- end of pending appointment --}}
    {{-- calendar appointment for today --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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