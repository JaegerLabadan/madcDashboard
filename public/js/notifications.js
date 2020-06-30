var callable;
var previous = 0;

function notifyMe() {
if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
}
else if (Notification.permission === "granted") {
        var options = {
                body: "New Appointments have been received!",
                icon: "icon.jpg",
                dir : "ltr"
            };
        var notification = new Notification("Hi there",options);
}
else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
    if (!('permission' in Notification)) {
        Notification.permission = permission;
    }
    
    if (permission === "granted") {
        var options = {
            body: "New Appointments have been received!",
            icon: "icon.jpg",
            dir : "ltr"
        };
        var notification = new Notification("Hi there",options);
    }
    });
}
}

function checkForNotifications(){

    $.ajax({

        url: "check_for_notifications",
        method: "GET",
        success: function(result){


            if(result[1] != 0){
                
               
                if(previous != result[1]){

                    $('#newNotifs').text(result[0]);
                    $('#unreadNotifs').text(result[1]);
                    notifyMe();
                    previous = result[1];
                }

            }

        }

    });
    callable = setTimeout(checkForNotifications, 10000);
        
}

$(document).ready(function(){
    
    checkForNotifications();

});