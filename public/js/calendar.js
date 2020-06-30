function getAppointments(){

    

    $.ajax({

        url: "calendar_appointments",
        method: "GET",
        success: function(result){

            // console.log(result);
            if(result != "NO APPOINTMENTS"){

                var counter = 0;
                $.each(result, function(key, val){

                    $('.fc-day').each(function() {
                    
                        var date = $(this).attr('data-date');
                        if(date == val['record_date']){
    
                            $(this).append('<br><div class="text-center number-of-appointments">'+ val['number_of_appointments'] +'</div>');

                        }
    
                    });

                });


            }
        }

    })
    
}

$(document).ready(function(){

    getAppointments();

    var calendarModalClone = $('#calendarModalContent').clone();

    $('.fc-current-month').on('click', function(){

        $('#calendarModalContent').replaceWith(calendarModalClone.clone());
        var date = $(this).attr('data-date');
        $.ajax({
            url: "get_appointments",
            method: "GET",
            data: {
                "date": date
            },
            success: function(result){
                if(result != "EMPTY"){
                    $('#dateSlot').append('<h2>'+date+'</h2>')
                    $.each(result, function(key, val){
                        if(val['slot_no'] == "slot 1"){
                            $('#slot1').append('<div class="row"><div class="col-sm-3">'+val['appointment_customer']+'</div><div class="col-sm-3">'+val['appointment_service']+'</div><div class="col-sm-3">'+val['phone']+'</div><div class="col-sm-3">'+val['appointment_time_start']+' - '+val['appointment_time_end']+'</div></div>');
                            $('#calendarModal').modal('show');
                        }
                        else if(val['slot_no'] == "slot 2"){
                            $('#slot2').append('<div class="row"><div class="col-sm-3">'+val['appointment_customer']+'</div><div class="col-sm-3">'+val['appointment_service']+'</div><div class="col-sm-3">'+val['phone']+'</div><div class="col-sm-3">'+val['appointment_time_start']+' - '+val['appointment_time_end']+'</div></div>');
                            $('#calendarModal').modal('show');
                        }
                        else if(val['slot_no'] == "slot 3"){
                            $('#slot3').append('<div class="row"><div class="col-sm-3">'+val['appointment_customer']+'</div><div class="col-sm-3">'+val['appointment_service']+'</div><div class="col-sm-3">'+val['phone']+'</div><div class="col-sm-3">'+val['appointment_time_start']+' - '+val['appointment_time_end']+'</div></div>');
                            $('#calendarModal').modal('show');
                        }
                        else{
                            $('#calendarModalContent').append('<div class="text-center"><h3>NO APPOINTMENTS</h3></div>')
                            $('#calendarModal').modal('show');
                        }
                    });
                }
            }
        })
        // Function for viewing approved appointments
    });

});