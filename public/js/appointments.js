$(document).ready(function(){

    // PENDING APPOINTMENTS
    var modalTextClone = $('#appointmentModalContent').clone();

    $('.appointment-form').click(function(){
        
        var date = $(this).attr('data-date');
        var start = $(this).attr('data-start');
        var end = $(this).attr('data-end');
        var slot = $(this).attr('data-slot');
        $('#appointmentModalContent').replaceWith(modalTextClone.clone());
        $('#appointmentModalTitle').text('Mark as approved?');
        $('#appointmentModalContent').append('<div class="row"><div class="col-md-6 text-center"><button data-date="'+date+'" data-start="'+start+'" data-end="'+end+'" data-slot="'+slot+'" id="approveYes" class="btn btn-warning custom-btn" type="button"><a href="#">YES</a></button></div><div class="col-md-6 text-center"><button id="approveNo" class="btn btn-warning custom-btn" type="button"><a href="#">NO</a></button></div></div>');
        $('#appointmentModal').modal('show');

    });

    $(document).on('click', '#approveYes', function(){

        var date = $(this).attr('data-date');
        var start = $(this).attr('data-start');
        var end = $(this).attr('data-end');
        var slot = $(this).attr('data-slot');
        // console.log(date);
        $.ajax({

            url: "approve_appointment",
            method: "POST",
            data: {
                date: date,
                start: start,
                end: end,
                slot: slot
            },
            success: function(result){

                if(result == "SUCCESS"){

                    location.reload();

                }

            }

        });

    });

    $(document).on('click', '#approveNo',  function(){

        $('#appointmentModal').modal('hide');

    });

    $('.delete-form').click(function(){

        var date = $(this).attr('data-date');
        var start = $(this).attr('data-start');
        var end = $(this).attr('data-end');
        var slot = $(this).attr('data-slot');
        $('#appointmentModalContent').replaceWith(modalTextClone.clone());
        $('#appointmentModalTitle').text('Delete appointment?');
        $('#appointmentModalContent').append('<div class="row"><div class="col-md-6 text-center"><button data-date="'+date+'" data-start="'+start+'" data-end="'+end+'" data-slot="'+slot+'" id="deleteYes" class="btn btn-warning custom-btn" type="button"><a href="#">YES</a></button></div><div class="col-md-6 text-center"><button id="deleteNo" class="btn btn-warning custom-btn" type="button"><a href="#">NO</a></button></div></div>');
        $('#appointmentModal').modal('show');

    });

    $(document).on('click', '#deleteYes', function(){

        var date = $(this).attr('data-date');
        var start = $(this).attr('data-start');
        var end = $(this).attr('data-end');
        var slot = $(this).attr('data-slot');
        // console.log(date);
        $.ajax({

            url: "delete_appointment",
            method: "POST",
            data: {
                date: date,
                start: start,
                end: end,
                slot: slot
            },
            success: function(result){

                if(result == "SUCCESS"){

                    location.reload();

                }

            }

        });

    });

    $(document).on('click', '#deleteNo', function(){

        $('#appointmentModal').modal('hide');

    });

    $('.view-form').click(function(){

        var date = $(this).attr('data-date');
        var start = $(this).attr('data-start');
        var end = $(this).attr('data-end');
        var slot = $(this).attr('data-slot');
        $('#appointmentModalContent').replaceWith(modalTextClone.clone());
        $('#appointmentModalTitle').text('APPOINTMENT DETAILS');
        $.ajax({

            url: "get_specific_appointments",
            method: "GET",
            data: {
                date: date,
                start: start,
                end: end,
                slot: slot
            },
            success: function(result){
                $.each(result, function(key, val){
                    $('#appointmentModalContent').append('<div class="appointment-details"><div class="text-left"><h3>'+val['slot_no']+'</h3><h5>DATE: '+val['appointment_date']+'</h5><h5>TIME: '+val['appointment_time_start']+' - '+val['appointment_time_end']+'</h5><h5>PROCEDURE: '+val['appointment_service']+'</h5></div><div class="row"><div class="col-sm-2"><h4> NAME:</h2></div><div class="col-sm-10"><H4> '+val['appointment_customer']+'</H5></div><div class="col-sm-2"><h4> PHONE:</h2></div><div class="col-sm-10"><H4> '+val['phone']+'</H5></div><div class="col-sm-2"><h4> EMAIL:</h2></div><div class="col-sm-10"><H4> '+val['email']+'</H5></div><div class="col-sm-12"><form action=""><div class="form-group"> <label for="exampleFormControlTextarea1">Add Comments</label><textarea class="form-control" id="commentValue" rows="3"></textarea></div><div class="form-group text-right"> <button type="button" id="commentBtn" class="btn btn-success" data-id="'+val['appointment_id']+'">SUBMIT</button></div></form></div></div>');
                });
            }

        });
        $('#appointmentModal').modal('show');

    });

    $(document).on('click', '#commentBtn', function(){

        var id = $(this).attr('data-id');
        var comment = $('#commentValue').val();

        if(comment != ""){
            
            $.ajax({

                url: "add_comment",
                method: "POST",
                data: {
                    "id": id,
                    "comments": comment
                },
                success: function(result){
                    
                    if(result == "SUCCESS"){
                        console.log("done");
                    }
                    else{
                        alert('Something went wrong!');
                    }

                }

            });

        }
        else{
            console.log('Comment is blank');
        }

    });

});