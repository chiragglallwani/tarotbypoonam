<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         
        <!-- Latest compiled and minified CSS -->

        <style>
            .color-bg{
                background-color: #551A8B;
            }
            li a{
                color: #ffcccb;
            }
            a.disabled{
                color: gray;
                pointer-events: none;
            }
            .nav-item{
                margin: auto 1.5vw;
                cursor: pointer;
            }
            .link-disabled{
                cursor: not-allowed;
                color: dimgrey;
                pointer-events: none;
                text-decoration: none;
            }
            .text-size{
                font-size: 1.3rem;
            }
            @media(max-width: 600px){
                .text-size{
                    font-size: 1rem;
                }
            }
             @media(max-width: 400px){
                .text-size{
                    font-size: 0.8rem;
                }
            }
        </style>

        <title>Nav Bar</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a id="nav-HomePage" onclick="document.getElementById('form-HomePage').submit();" class="navbar-brand p-2 text-size"  >TarotbyPoonam</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto d-flex">
        <li class="nav-item mr-3">
          <a onclick="document.getElementById('form-HomePage').submit();" id="nav-HomePage" class="nav-link text-size text-white" >Home</a>
        </li>
        <li class="nav-item mr-3">
          <a id="nav-AppointmentPage" class="nav-link text-white text-size" onclick="document.getElementById('form-AppointmentPage').submit();">Appointment</a>
        </li>
        <li class="nav-item mr-3">
          <a id="nav-ShoppingPage" class=" text-size nav-link text-white" onclick="document.getElementById('form-ShoppingPage').submit();">Shopping</a>
        </li>
        <li class="nav-item mr-3">
          <a id="nav-FeedbackPage" class="text-size nav-link text-white" onclick="document.getElementById('form-FeedbackPage').submit();">Feedback</a>
        </li>
          <li class="nav-item mr-3">
          <a id="nav-PhotosPage" class=" text-size nav-link text-white " onclick="document.getElementById('form-PhotosPage').submit();">Photos</a>
        </li>
          <li class="nav-item mr-3">
          <a id="nav-AboutYou" class=" text-size nav-link mr-3 text-white" onclick="document.getElementById('form-AboutYou').submit();">About Me</a>
        </li>
          <button id="nav-logout" type="submit" class="rounded shadow btn mr-3 text-white color-bg" >Logout</button>
      </ul>
    </div>
  </div>
</nav>
        <form id="form-logout" method="post" action="Controller.php" style="display:none;">
            <input type="hidden" name='page' value='navbar'>
            <input type="hidden" name="command" value="logout">
            <input type="submit">
        </form>
        
        
        <form id="form-HomePage" method="post" action="Controller.php" style="display:none;">
            <input type="hidden" name='page' value='navbar'>
            <input type="hidden" name="command" value="HomePage">
            <input type="submit">
        </form>
        <form id="form-AppointmentPage" method="post" action="Controller.php" style="display:none;">
            <input type="hidden" name='page' value='navbar'>
            <input type="hidden" name="command" value="AppointmentPage">
            <input type="submit">
        </form>
        <form id="form-ShoppingPage" method="post" action="Controller.php" style="display:none;">
            <input type="hidden" name='page' value='navbar'>
            <input type="hidden" name="command" value="ShoppingPage">
            <input type="submit">
        </form>
        <form id="form-FeedbackPage" method="post" action="Controller.php" style="display:none;">
            <input type="hidden" name='page' value='navbar'>
            <input type="hidden" name="command" value="FeedbackPage">
            <input type="submit">
        </form>
        <form id="form-PhotosPage" method="post" action="Controller.php" style="display:none;">
            <input type="hidden" name='page' value='navbar'>
            <input type="hidden" name="command" value="PhotosPage">
            <input type="submit">
        </form>
        <form id="form-AboutYou" method="post" action="Controller.php" style="display:none;">
            <input type="hidden" name='page' value='navbar'>
            <input type="hidden" name="command" value="AboutYou">
            <input type="submit">
        </form>
    </body>
    <script>
        document.getElementById('nav-logout').addEventListener('click', function(){
            document.getElementById('form-logout').submit();
        });
        
        $.ajax({
            url: "Controller.php",
            data: {
                page: "navbar", command: "AboutuserDetails"
            },
            type: 'Post',
            success: function(responseText){
                var user_details = JSON.parse(responseText);
                if(user_details.length > 0){
                }
                else{
                    var links = document.getElementsByTagName('a');
                    var lis = document.getElementsByTagName('ul');
                    for( var key in links){
                        links[key].className = "link-disabled";
                    }
                    lis.className = 'mt-3';
                }
            }
        });
    </script>
</html>