<!DOCTYPE html>
<html>
    <head>
        <title>Feedback: tarotbypoonam</title>
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
            @import url('https://fonts.googleapis.com/css2?family=Miriam+Libre:wght@700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Della+Respira&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&display=swap');
             @import url('https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed&display=swap');
            body::-webkit-scrollbar{
                display: none;
            }
            .feedback_header{
                background-image: url("view_feedback_header.jpg");
                background-size: cover;
                background-position: bottom;
                background-repeat: no-repeat;
                opacity: 0.95;
                width: 100%;
                height: 40vw;
                filter: brightness(0.5);
            }
            .header-h1{
                color: white;
                width: 60vw;
                line-height: 1;
                margin: 2.5vw 0 3vw 1.5vw;
                font-size: 3.2vw;
                font-family: 'Arima Madurai', cursive;
            }
            .header-text{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
            .show-button{
                display: inline-flex;
                 font-family: 'Miriam Libre', sans-serif;
                margin-left: 2vw;
                border: 1px solid white;
                padding: 1.1vw;
                width: 15vw !important;
                border-radius: 1.5rem;
                background: transparent;
                color: white;
                font-size: 1.8vw;
            }
            .show-button:hover{
                text-decoration: none;
                color: white;
                background: rgba(255,255,255,.3);
            }
            .feedback-button-give{
                font-family: 'Miriam Libre', sans-serif;
                margin-left: 3vw;
                border: 1px solid white;
                height: 5vw;
                width: 15vw;
                border-radius: 1.5rem;
                background: transparent;
                color: white;
                font-size: 1.8vw;
            }
            .feedback-button-give:hover{
                background: rgba(255,255,255,.3);
            }
            .container-header{
                font-family: 'Arima Madurai', cursive;
            }
            .feedback-p{
                font-family: 'Encode Sans Semi Condensed', sans-serif;
                
            }
            .user-style{
                background-color: #FF6E6E; 
                width: 10vw;
                height: 5vw;
                margin: auto;
                padding: auto;
            }
            
            .text-size{
                font-size: 1.5vw !important;
            }
            .text-span{
                font-size: 1.3vw !important;
            }
            @media(max-width:600px){
               
            }
        </style>
    </head>
    <body>
        <div class="feedback_header"></div>
        <header>
            <div class="header-text">
                 <?php include('view_NavBar.php');?>
                <h1 class="header-h1">Confused about the session here are some of the feedbacks given by the clients after the session with me.</h1>
                <a id="feedback-example" class="show-button" href="#feedback-replies">Show clients feedback</a>
                <button id="give-feedback" data-target="#modal-feedback" type="button" data-toggle="modal" class="feedback-button-give">
                        Give your feedback
                    </button>
            </div>  
            </header>
        
        <div class="container-fluid" style="background-color: #FFFF94;">
            <div class="row mx-auto w-75" >
                <section class="col-lg my-5">
                    <h2 class="text-center container-header">Feedbacks given by clients</h2>
                    <div data-bs-spy="scroll" data-bs-target="#feedback-example" data-bs-offset="0" tabindex="0" id="feedback-replies" class="container-fluid my-auto mx-auto" >
    
                    </div>
                </section>
                
            </div>
        </div>
        
        <!-- feedback modal window-->
        <div id="modal-feedback" class="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90%;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Any of your feedback will be appreciated</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="form " method="post" action="Controller.php">
                    <div class="modal-body">
                        <input type="hidden" name="page" value="FeedbackPage">
                    <input type="hidden" name="command" value="give-feedback">
                        <div class="form-group row">
                            <label for="feedback-name" class="col-sm-4 col-form-label">Full Name: </label>
                            <div class="col-sm-10">
                                <input name="feedback-name" type="text" class="form-control" id="feedback-name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="feedback-message" class="col-sm-4 col-form-label">Your feedback: </label>
                            <div class="col-sm-10">
                                <textarea name="feedback-message" type="text" class="form-control" id="feedback-message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id='submit-feedback' type="button" data-dismiss="modal"  class="btn btn-primary">Submit Feedback</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <script>
            function show_feedbacks(){
                $.ajax({
                url: "Controller.php",
                data: {
                    page: 'FeedbackPage', command: 'get-feedback'
                },
                    type: 'Post',
                    success: function(responseText){
                        var feedbacklist = JSON.parse(responseText);
                        var str = ""
                        for(let i = 0; i<feedbacklist.length; i++){
                             str += '<p class="feedback-p p-1 mx-auto my-5 rounded  text-size">' + 
                            '<b>' + feedbacklist[i][0].charAt(0).toUpperCase() + feedbacklist[i][0].substring(1) + ' says: </b>'
                            + feedbacklist[i][1];
                            str += '<span class="text-span d-block  text-secondary float-right">' + feedbacklist[i][2] + "  " + feedbacklist[i][3] + '</span></p>';
                        }
                        $("#feedback-replies").html(str);
                    }
            });
            }
            
            $("#submit-feedback").click(function(event){
                event.preventDefault();
                $("#modal-feedback").modal("hide");
                
                var name = $("#feedback-name").val();
                var message = $("#feedback-message").val();
    
                $.ajax({
                    url: "Controller.php",
                    data: {
                        page: "FeedbackPage", command: "give-feedback",
                        feedback_name: name,
                        feedback_message: message
                    },
                    type: "Post",
                    success: function(responseText){
                        show_feedbacks();
                    }
                })
            });
            
            show_feedbacks();
            
        </script>
    </body>
</html>