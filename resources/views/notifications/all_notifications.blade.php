@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="row align-items-center dashboard-notif" style="margin: 11vw 0 0 0;">
       <div class="col-2"></div>
       <div class="col-8 notif-table">
          <table class="table table-borderless">
             {{-- pending --}}
             <tbody class="notif">
                <tr class="notif-header">
                   <td colspan="7">
                      <h5>Notifications</h5>
                   </td>
                </tr>
                <tr class="notif-label">
                   <td style="text-align: center">Slot</td>
                   <td style="width: 4vw;"">Date</td>
                   <td style="width: 4vw">Time</td>
                   <td style="width: 4vw">Service</td>
                   <td style="width: 6vw">Name</td>
                   <td style="width: 4vw">Contact No.</td>
                   <td style="width: 8vw;text-align: center;vertical-align: middle;">Actions</td>
                </tr>
                <tr>
                   <td class="notif-checkbox"><span style="margin-left:0vw;"><input type="checkbox" name="" id=""></span></td>
                   <td style="width: 4vw">june 5 2020</td>
                   <td style="width: 4vw">6:03 PM</td>
                   <td style="width: 4vw">cleaning</td>
                   <td style="width: 6vw">jessie valeza </td>
                   <td style="width: 4vw">0906-055-5365</td>
                   <td style="width: 8vw;text-align: center;vertical-align: middle;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <i class="fa fa-comment"></i>
                   </td>
                </tr>
             </tbody>
          </table>
       </div>
       <div class="col-2"></div>
        </div>
    </div>
</div>

@endsection