<!DOCTYPE html>
<html>
    <head>
        <title>Appointment: tarotbypoonam</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Miriam+Libre:wght@700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed&display=swap');
            body::-webkit-scrollbar{
                display: none;
            }
            .background-image{
                background-image: url('appointment_header_image.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                opacity: 0.95;
            }
            header .book-button{
                font-family: 'Miriam Libre', sans-serif;
                margin-bottom: 15vw;
                margin-left: 3vw;
                border: 1px solid white;
                height: 5vw;
                width: 15vw;
                border-radius: 1.5rem;
                background: transparent;
                color: white;
                font-size: 1.8vw;
            }
            header .book-button:hover{
                background: rgba(255,255,255,.3);
            }
            header .show-button{
                font-family: 'Miriam Libre', sans-serif;
                margin-bottom: 15vw;
                margin-left: 2vw;
                border: 1px solid white;
                padding: 1.1vw;
                width: 10vw;
                border-radius: 1.5rem;
                background: transparent;
                color: white;
                font-size: 1.8vw;
            }
            .show-button:hover{
                text-decoration: none;
                background: rgba(255,255,255,.3);
            }
            .header-h1{
                color: white;
                width: 40vw;
                line-height: 1.2;
                margin: 2.5vw 0 2.5vw 1.5vw;
                font-size: 4.5vw;
                font-family: 'Arima Madurai', cursive;
            }
            .table-div{
                border: round;
                margin: 10vw;
                padding: 2vw;
                box-shadow: 0px 0px 15px 15px rgba(125,125,125,0.5);
                max-width: 80vw;
            }
            table{
                font-family: 'Encode Sans Semi Condensed', sans-serif;
            }
            .user-style{
                background-color: #FF6E6E; 
                width: 10rem;
                height: 5rem;
                margin-right: 25%;
                padding: auto;
                float: right;
                margin-bottom: 3% !important;
                
            }
            
            
            @media(max-width:520px){
                table{
                    max-width: 20vw;
                }
            }
            
            @media(max-width:376px){
                table{
                    max-width: 0vw;
                }
            }
        </style>
    </head>
    <body>
        <header class="background-image">
            <?php include('view_NavBar.php');?>
            <h1 class="header-h1">Have you booked an appointment for a session with Poonam</h1>
            <a id="scroll-example" class="show-button" href="#appointment-table">Show My Appointment</a>
            <button type="button" class="book-button" data-toggle="modal" data-target="#modal-appointment">
              Book Now!
            </button>
        </header>
        <div data-bs-spy="scroll" data-bs-target="#scroll-example" data-bs-offset="0" tabindex="0" class="container-fluid table-div rounded">
            <h1 class=" h1 my-5 text-center" style="font-family: 'Arima Madurai', cursive;">Your appointment list</h1>
            <div class="table-responsive-xl">
                <table id="appointment-table" class="table">
                  <thead class="table-warning">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Type</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                    </tr>
                  </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Appointment modal window-->
        <div id="modal-appointment" class="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90%;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Please fill the form to book an appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="form " method="post" action="Controller.php">
                    <div class="modal-body">
                        <input type="hidden" name="page" value="Appointment">
                    <input type="hidden" name="command" value="book-appointment">
                        <div class="form-group row">
                            <label for="appointment-name" class="col-sm-4 col-form-label">Full Name: </label>
                            <div class="col-sm-10">
                                <input name="fullname" type="text" class="form-control" id="appointment-name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <legend class="col-form-label col-sm-4">
                            Appointment type:
                            </legend>
                            <div class="form-check my-2">
                              <input class="form-check-input" type="radio" name="appttype" id="OnlineRadio" value="Online" checked>
                              <label class="form-check-label" for="OnlineRadio">
                                Online
                              </label>
                            </div>
                            <div class="form-check ml-5 my-2">
                              <input class="form-check-input" type="radio" name="appttype" id="OflineRadio" value="Ofline">
                              <label class="form-check-label" for="OflineRadio">
                                Ofline
                              </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="appointment-date" class="col-sm-4 col-form-label">On Date: </label>
                            <div class="col-sm-10">
                                <input name="date" type="date" class="form-control" id="appointment-date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="appointment-time" class="col-sm-4 col-form-label">On time: </label>
                            <div class="col-sm-10">
                                <input name="time" type="time" class="form-control" id="appointment-time">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id='submit-book-appointment' type="button" data-dismiss="modal"  class="btn btn-primary">Book Appointment</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <script>
            $('#submit-book-appointment').click(function(event){
                event.preventDefault();
                $('#modal-appointment').modal("hide");
                var name = $("#appointment-name").val();
                var appointmentType = $("input:radio[name='appttype']:checked").val();
                var dates = $("#appointment-date").val();
                var time = $("#appointment-time").val();
                
                /* clear the input values*/
                $("#appointment-name").val('');
                $("#appointment-date").val('');
                $("#appointment-time").val('');
            $.ajax({
                url: "Controller.php",
                data: {
                    page: 'Appointment', command: "book-appointment", fullname: name, apptType: appointmentType ,date: dates, time: time
                },
                type: "Post",
                success: function(reponsText){
                    display_appointments(); //display the list after bookings
                }
            });
                });
            function display_appointments(){
            $.ajax({
                    url: "Controller.php",
                data: {
                    page: 'Appointment', command: "show-appointment"
                },
                type: "Post",
                    success: function(responseText){
                            //alert(responseText);
                    var appointmentList = JSON.parse(responseText);
                        var str = "";
                        for(let i = 0; i < appointmentList.length; i++){
                            str += '<tr>' + '<td><img src="trash.svg" width="25px" appointment-id = ' + appointmentList[i][0] +  ' height="25px"></td>' + '<td>' + appointmentList[i][1] + '</td>' + '<td>' + appointmentList[i][2] + '</td>' + '<td>' + appointmentList[i][3] + '</td>' + '<td>' + appointmentList[i][4] + '</td>'+'<td>' + appointmentList[i][5] + '</td>' + '</tr>';
                        }
                        $('tbody').html(str);
                        
                        $('img[appointment-id]').click(function(){
                            var appointmentId = $(this).attr('appointment-id');
                            $.post("Controller.php",{
                                page: 'Appointment', command: 'delete-appointment', appointment_id: appointmentId
                            },function(){
                                display_appointments();
                            })
                        });
                    }
                });}
            display_appointments(); //display bookings when page opens.
        </script>
    </body>
</html>
