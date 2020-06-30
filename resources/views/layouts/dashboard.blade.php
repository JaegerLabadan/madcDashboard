<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/madc-favicon.png') }}"/>
    {{-- <link rel="icon" href="{{ asset('img/madc-favicon.png') }}" type="image/x-icon"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fullcalendar/core/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fullcalendar/daygrid/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fullcalendar/list/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fullcalendar/timegrid/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard_table.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset('fullcalendar/core/main.js') }}" defer></script>
    <script src="{{ asset('fullcalendar/interaction/main.js') }}" defer></script>
    <script src="{{ asset('fullcalendar/daygrid/main.js') }}" defer></script>
    <script src="{{ asset('fullcalendar/list/main.js') }}" defer></script>
    <script src="{{ asset('fullcalendar/timegrid/main.js') }}" defer></script>
    <script defer>

      $.ajaxSetup({

      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }

      });

    </script>
    <script src="{{ asset('calendar-madc.js') }}" defer></script>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
    <script src="{{ asset('js/notifications.js') }}" defer></script>
    <script src="{{ asset('js/appointments.js') }}" defer></script>
    <title>Dashboard</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Marck+Script&display=swap');
     

      .fc-today-button.fc-button.fc-button-primary, .fc-button-primary{
      background: rgb(230, 230, 230);
      color: black;
      padding: 0.1vw 0.6vw;
      border-radius: 0px;
      border: none;
      }
    </style>
  </head>
  <body>
    {{-- side nav bar --}}
    <div class="container-fluid p-0">
      <div class="sidenav">
        <a href="{{ route('home') }}"><img src="{{ asset('logo.png') }}" class="img-fluid dash-logo" alt="Responsive image"></a>
        <div class="row notification">
          <div class="col-12">
            <span>
              <h2><a class="bar highlight" href="#">notifications</a></h2>
            </span>
            <span>
              <h2><a class="bar" href="{{ route('new_notifs') }}">new <span id="newNotifs" class="badge badge-warning">0</span></h2></a></h2>
            </span>
            <span>
              <h2><a class="bar" href="{{ route('unread_notifs') }}">unread <span id="unreadNotifs" class="badge badge-warning">0</span></h2></a></h2>
            </span>
          </div>
        </div>
        <div class="row appointment">
          <div class="col-12">
            <span>
              <h2><a class="bar highlight" href="#">appointment</a></h2>
            </span>
            <span>
              <h2><a class="bar" href="{{ route('pending_appointments') }}">pending</a></h2>
            </span>
            <span>
              <h2><a class="bar" href="{{ route('followup_appointments') }}">for follow-up</a></h2>
            </span>
            <span>
              <h2><a class="bar" href="{{ route('appointments_today') }}">today</a></h2>
            </span>
            <span>
              <h2><a class="bar" href="{{ route('appointments_this_month') }}">month</a></h2>
            </span>
          </div>
        </div>
        <div class="row settings">
          <div class="col-12">
            <span>
              <h2 ><a class="bar highlight" href="#">settings</a></h2>
            </span>
            <span>
              <h2>
                <a class="bar" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                    {{ __('Log-out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </h2>
            </span>
          </div>
        </div>
      </div>
    </div>
    {{-- end of nav bar --}}
    <div class="container-fluid p-0">
    {{-- date-time-notification --}}
    {{-- <div class="row dashboard-date-time">
      <div class="col-2"></div>
      <div class="col-8">
        <span>
          <h3>june 1 1995</h3>
        </span>
        <span>
          <h2>6:37 PM</h2>
        </span>
        <span class="notif">
          <h2>notifications</h2>
        </span>
      </div>
      <div class="col-2"></div>
    </div> --}}
    {{-- notification --}}
    {{-- <div class="row align-items-center dashboard-notification" style="margin: 0;">
      <div class="col-2"></div>
      <div class="col-8">
        <table class="table table-borderless notif-table">
          <tbody>
            <tr>
              <td style="width: 4vw;"><span class="new-notif">new</span></td>
              <td style="width: 15vw">appointment submitted</td>
              <td style="width: 7vw">6:03 PM</td>
              <td>june 22 2020</td>
              <td>new customer</td>
            </tr>
            <tr>
              <td style="width: 4vw"><span class="new-notif">new</span></td>
              <td style="width: 15vw">doc mark sent a note</td>
              <td style="width: 7vw">6:03 PM</td>
              <td>june 22 2020</td>
              <td>doc mark</td>
            </tr>
            <tr>
              <td style="width: 4vw"><span></span></td>
              <td style="width: 15vw">appointment editted</td>
              <td style="width: 7vw">6:03 PM</td>
              <td style="width: 10vw">june 22 2020</td>
              <td>front desk</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> --}}
    {{-- end of notification --}}
    @yield('content')
  </body>
</html>