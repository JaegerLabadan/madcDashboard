function getAppointments(){

    $.ajax({

        url: "calendar_appointments",
        method: "GET",
        success: function(result){
            if(result != "NO APPOINTMENTS"){

                var counter = 0;
                $.each(result, function(){

                    $('.fc-day').each(function() {
                    
                        var date = $(this).attr('data-date');
                        if(date == result[counter]['record_date']){
    
                            $(this).append('<br><div class="text-center number-of-appointments">'+ result[counter]['number_of_appointments'] +'</div>');
                            console.log(result[counter]['number_of_appointments'])
                            
                        }
                        else{}
    
                    });
                    counter++;

                });


            }
        }

    })
    
}

$(document).ready(function(){

    getAppointments();

    $('.fc-current-month').on('click', function(){

        var date = $(this).attr('data-date');
        console.log(date);
        // Function for viewing approved appointments

    });

});