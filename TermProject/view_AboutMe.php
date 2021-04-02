<!DOCTYPE html>
<html>
    <head>
        <title>About You: tarotbypoonam</title>
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
            .vertical-line{
                border-left: 1px solid #000;
                height: 90vh;
                margin-left: 3rem;
            }
            
            .user-style{
                background-color: #FF6E6E; 
                width: 12rem;
                height: 3rem;;
                margin: 2rem 0 0 2rem;
                padding-top: 0.5rem;
            }
            .btn{
                margin: 1.5vw 3vw;
            }
            footer{
                width: 100%;
                font-size: 1vw;
                align-items: center;
            }
            
            @media(max-width:600px){
                #fullname{
                    margin-left: 3vw !important;
                }
                aside{
                    display: none;
                }
            }
            @media(max-width:350px){
                aside{
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        
        <header style="background-color: #ffcccb;">
             <?php include('view_NavBar.php');?>
        </header>
        <div class="container-fluid">
            <div class="row">
            <section class="rounded user-style col-xs">
                <h4 class="text-white text-center">User Profile</h4>
            </section>
            <aside class="vertical-line col-xs"></aside>
            <section class=" ml-5 my-5 col">
                <form id="user-form" method="post" action="Controller.php">
                    <input type="hidden" name='page' value='AboutmePage'>
                    <input type='hidden' name='command' value='userdetails'>
                    <div class="row-md-8">
                        <div class="form-group row">
                            <label for="fullname" class="col-xs mx-auto text-size">FullName: </label>
                            <input
                                   required='required'
                                   name = 'user_fullname' type="text" class="form-control col-md-8  text-size mx-auto" id="fullname" placeholder="For example: Mike Oath">
                        </div>
                    </div>
                    <div class="row-md-8">
                        <div class="form-group row">
                            <label for="datofbirth" class="col-xs mx-auto text-size">Date of Birth: </label>
                            <input
                                   name='user_dob' type='date' class=" mx-auto form-control col-md-8 text-size" id="dateofbirth">
                        </div>
                    </div>
                    <div class="row-md-8">
                        <div class="form-group row">
                            <legend class="text-size col-form-label mx-auto col-sm-2 pt-0 mt-3">Gender:</legend>
                            <div class=" mb-5 col-md-8">
                                <div class="row mt-3 mx-5">
                                <div class="form-check col-sm-4 text-size">
                                    <div class="row-sm">
                                    <input class="col-xs mt-3" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked style="transform: scale(1.8);">
                                    <label class="ml-3 col-xs" for="gridRadios1">
                                    Male
                                  </label>
                                        </div>
                                </div>
                                <div class="form-check col-sm-4 text-size">
                                  <div class="row-sm">
                                    <input class="col-xs mt-3" type="radio" name="gridRadios" id="gridRadios1" value="Female" style="transform: scale(1.8);">
                                    <label class="ml-3 col-xs" for="gridRadios1">
                                    Female
                                  </label>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row-md-8">
                        <div class="form-group row">
                            <label for="emailinput" class="col-xs mx-auto text-size">Email: </label>
                            <input name="user_email" type='email' class="form-control col-md-8 w-100 text-size mx-auto" id="emailinput" placeholder="MikeOath123@gmail.com">
                        </div>
                    </div>
                    
                    <div class="row-md-8">
                        <div class="form-group row">
                            <label for="contactinput" class="col-xs mx-auto text-size">Contact: </label>
                            <input required='required' name="user_contact" type='tel' class="form-control col-md-8 mx-auto text-size" id="contactinput" placeholder="123-456-7890" >
                        </div>
                    </div>
                    
                    <div class="row-md-8">
                        <div class="form-group row">
                            <label for="addressinput" class="col-xs mx-auto text-size">Address: </label>
                            <textarea name="user_address" type='text' class="form-control col-md-8 mx-auto text-size" id="addressinput" placeholder="enter your address here...."  rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-end mr-5">
                        <button id="save-button" type="submit" class="btn text-white col-xs" style="background-color: #67AB9F">Save Profile</button>
                        <button id="delete-btn" type="button" class="btn text-white btn-danger col-xs ">Delete Account</button>
                    </div>
                </form>
            </section>
            </div>
        </div>
    <form id='form-delete-user-profile' method='post' action='Controller.php' style='display:none'>
        <input type='hidden' name='page' value='AboutmePage'>
        <input type='hidden' name='command' value='DeleteProfile'>
        <input type='submit'>
    </form>
        
        
        
        <!-- Display modal window when user enters the details for first time-->
        
        <div id="signupform-modal" class="modal" tabindex="-1" style="display:none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Fill the form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Please Fill the form inorder to access the website.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </body>
    <footer class="text-center" style="position: fixed; background-color: #551A8B; bottom:0px;" >
        <p class="text-white">Thompson Rivers University | Advance Web development | TarotbyPoonam 2021 &copy; All Rights Reserved</p>
    </footer>
    <script>
        $.ajax({
            url: 'Controller.php',
            data: {
                page: 'navbar', command: 'AboutuserDetails'
            }, type: 'post',
            success: function(responseText){
                //alert(responseText);
                var user_details = JSON.parse(responseText); 
                
                if(user_details.length > 0){
                    document.getElementById('save-button').innerHTML = "Update Profile";
                document.getElementById('fullname').value = user_details[0][0];
                document.getElementById('dateofbirth').value = user_details[0][1];
                
               if(user_details[0][2] == 'Male'){
                   document.querySelector("[value = Male]").checked = true;
               }else{
                   document.querySelector("[value = Female]").checked = true;
               }
                
                document.getElementById('emailinput').value = user_details[0][3];
                
                document.getElementById('contactinput').value = user_details[0][4];
                
                document.getElementById('addressinput').value = user_details[0][5];
                }else{
                    alert('Please fill the form in order to access the website!');
                }
            }
        })
        
        document.getElementById('delete-btn').addEventListener('click', function(){
            document.getElementById('form-delete-user-profile').submit();
        });
    </script>
</html>