@extends('layouts.dashboard')

@section('content')

<div class="row align-items-center dashboard-appointments" style="margin: 2vw 0 0 0;">
    <div class="col-2"></div>
    <div class="col-9 pending-table">
      <table class="table table-borderless">
        {{-- pending --}}
        <tbody class="pending">
          <tr class="pending-header"><td colspan="7"><h5 style="color:#da5a01">New Notifications</h5></td></tr>
          @foreach($notification as $data)
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
      {{ $notification->links() }}
    </div>
    <div class="col-1"></div>
</div>

@endsection