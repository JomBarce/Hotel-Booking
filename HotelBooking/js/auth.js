var xhttp = new XMLHttpRequest();

function signupSubmit(e){
    var data = $("#signupForm").serialize();
    $.ajax({
        type : 'POST',
        url : './php/signup_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            console.log(res["message"]);
            if(res["status"] == 200){
                $('#signupForm')[0].reset();
            }
        }
    });
    Swal.fire({
        title: 'SUCCESS!',
        text: "Account Created Successfully",
        icon: 'success',
        confirmButtonColor: '#3C64B1',
        confirmButtonText: 'Sign In'
      }).then((result) => {
        window.location.href = './signin.php';
      })
    e.preventDefault();
}

function signinSubmit(e){
    var url = "./php/signin_action.php";
    var data = $("#signinForm").serialize();
    var urlData = url+"?"+data;
    xhttp.open("GET", urlData, true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var res = JSON.parse(this.responseText);
            if(res["status"] == 200){
                $('#signinForm')[0].reset();
                window.location.replace('./index.php');
            }else{
                alert(res["message"]);
            }
        }
    };
    e.preventDefault();
}

function signoutClick(e){
    Swal.fire({
        title: 'Sign Out',
        text: "Are you sure you want to sign out?",
        imageUrl: './images/icons/exit.png',
        imageWidth: 150,
        imageHeight: 150,
        showCancelButton: true,
        confirmButtonColor: '#3C64B1',
        confirmButtonText: 'Yes',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            var url = "./php/signout_action.php";
            xhttp.open("GET", url, true);
            xhttp.send();
             xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var res = JSON.parse(this.responseText);
            if(res["status"] == 200){
                window.location.replace('./signin.php');
            }
        }
    };
        }
    });
}

function searchSubmit(e){
    var data = $("#searchForm").serialize();
    $.ajax({
        type : 'POST',
        url : './php/search_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["message"] != ""){
                console.log(res["message"]);
                Swal.fire({
                    title: 'Invalid Input',
                    text: res["message"],
                    icon: 'error',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                });
            }
            if(res["status"] == 200){
                window.location.replace('./search_result.php');
            }
        }
    });
    e.preventDefault();
}

function searchHotel(e){
    var data = $("#searchHname").serialize();
    $.ajax({
        type : 'POST',
        url : './php/search_hotel_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["message"] != ""){
                alert(res["message"]);
            }
            if(res["status"] == 200){
                window.location.replace('./search_result.php');
            }
        }
    });
    e.preventDefault();
}

function filterSubmit(e){
    var data = $("#filterForm").serialize();
    $.ajax({
        type : 'POST',
        url : './php/filter_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["message"] != ""){
                alert(res["message"]);
            }
            if(res["status"] == 200){
                window.location.replace('./search_result.php');
            }
        }
    });
}

function hotelSubmit(e){
    var data = {'hotelid': e};
    if(e == 0){
        Swal.fire({
            title: 'Invalid Date',
            text: "Please fill the Check In and Check Out dates",
            imageUrl: './images/icons/calendar.png',
            imageWidth: 150,
            imageHeight: 150,
            confirmButtonColor: '#3C64B1',
            confirmButtonText: 'Ok'
          }).then((result) => {
            window.location.replace('./search_result.php');
          });
    }else{
        $.ajax({
            type : 'POST',
            url : './php/hotel_action.php',
            data : data,
            success : function(response) {
                var res = JSON.parse(response);
                if(res["message"] != ""){
                    alert(res["message"]);
                }
                if(res["status"] == 200){
                    window.location.href = './book_hotel.php';
                }
            }
        });
    }
}

function searchSubmit2(e){
    var data = $("#searchForm").serialize();
    $.ajax({
        type : 'POST',
        url : './php/search_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["message"] != ""){
                alert(res["message"]);
            }
            if(res["status"] == 200){
                window.location.replace('./book_hotel.php#heroImage');
            }
        }
    });
}

function reserveSubmit(user, hotel, room, price, cancel){
    var data = {
        'userid' : user,
        'hotelid': hotel,
        'roomid': room,
        'price': price,
        'cancel': cancel
        };
    if(user == 0){
        Swal.fire({
            title: 'Sign In',
            text: "Sign in to Reserve or Book a Hotel",
            imageUrl: './images/icons/profile.png',
            imageWidth: 150,
            imageHeight: 150,
            showCancelButton: true,
            confirmButtonColor: '#3C64B1',
            confirmButtonText: 'Sign In',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('./signin.php');
            }else{
                window.location.replace('./book_hotel.php');
            }
          });
    }else{
        Swal.fire({
            title: 'Reserve a Room?',
            text: "Click Continue",
            imageUrl: './images/icons/key.png',
            imageWidth: 200,
            imageHeight: 200,
            imageAlt: 'Custom image',
            showCancelButton: true,
            confirmButtonColor: '#3C64B1',
            confirmButtonText: 'Continue',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type : 'POST',
                    url : './php/reserve_action.php',
                    data : data,
                    success : function(response) {
                        var res = JSON.parse(response);
                        if(res["message"] != ""){
                            alert(res["message"]);
                        }
                        if(res["status"] == 200){
                            Swal.fire({
                                title: 'SUCCESS!',
                                text: "Hotel Booked Successfully",
                                icon: 'success',
                                confirmButtonColor: '#3C64B1',
                                confirmButtonText: 'Ok'
                              }).then((result) => {
                                window.location.replace('./bookings.php');
                              });
                        }
                    }
                });
            } else {
                window.location.replace('./book_hotel.php');
            }
        });
    }
    e.preventDefault();
}

function cancelHotel(e){
    var data = {'bookingid': e};
    Swal.fire({
        title: 'Cancel Booking',
        text: "Do you want to cancel the reservation?",
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3C64B1',
        confirmButtonText: 'Yes',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No'
    }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type : 'POST',
                    url : './php/cancel_action.php',
                    data : data,
                    success : function(response) {
                        var res = JSON.parse(response);
                        if(res["message"] != ""){
                            alert(res["message"]);
                        }
                        if(res["status"] == 200){
                            window.location.replace('./bookings.php');
                        }
                    }
                });
            }
    });
}