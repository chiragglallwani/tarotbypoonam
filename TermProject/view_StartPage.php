<!DOCTYPE html>

<html>
    <head>
        <title>TarotByPoonam login/signup</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="view_StartPage.css">
    </head>
    
    <body>
        <div class="container" id="container">
            <div id="signup-container" class="form-container sign-up-container">
            
                <form method="post" action="Controller.php">
                     <input type='hidden' name='page'
                           value='StartPage'>
                    <input type='hidden' name='command'
                           value='SignUp'>
                    <h1>Create Account</h1>
                    <input  required="required" autocomplete="on" id="signup-username"
                           name='signup-username' type="text" placeholder="Username"/>
                    <?php if(!empty($error_username_signup)){
    echo $error_username_signup;} ?>
                    <input  required="required" autocomplete="on" id="signup-email"
                           name='signup-email' type="email" placeholder="Email"/>
                    <input  required="required" autocomplete="on" id="signup-password" 
                           name='signup-password' type="password" placeholder="Password"/>
                    <?php if(!empty($error_password_signup)){
    echo $error_password_signup;} ?>
                    <button class="button" type="submit">Sign Up</button>
                    <button class="button" type="Reset">Reset</button>
                </form>
            </div>
            <div id="signin-container" class="form-container sign-in-container">
                <form method="post" action="Controller.php">
                    <input type='hidden' name='page'
                           value='StartPage'>
                    <input type='hidden' name='command'
                           value='LogIn'>
                    <h1>Log In</h1>
                    <input autocomplete="on" id="login-username"
                           name='login-username' type="text" placeholder="Username"/>
                    <?php  if (!empty($error_username_login)){
    echo '<p style="color: red; font-size: 0.7em; margin: -5px;"> '. $error_username_login . '</p>';
}?>
                    <input autocomplete="on" id="login-password" 
                           name='login-password' type="password" placeholder="Password"/>
                    <?php  if (!empty($error_password_login)){
    echo '<p style="color: red; font-size: 0.7em; margin: -5px;"> '. $error_password_login . '</p>';
}?>
                    <a id="forgot-password" data-toggle='modal' data-target='#modal-forgot-password'>Forgot your password</a>
                    <button class="button" type="submit">Login</button>
                    <button class="button" type="reset">Reset</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>If you are already a user click on the button below</p>
                        <button class="ghost button" id="signIn">Log In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello Friend</h1>
                        <p>If you are a new user start your journey with us.</p>
                        <button class="ghost button" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- forgot password modal --> 
        <div id='modal-forgot-password' class='modal fade'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <form method='post' action='Controller.php' >
                    <div class='modal-header'>
                        <h2 class='modal-title'>Forgot a password</h2>
                    </div>
                    <div class='modal-body'>
                        <input type='hidden' name='page' value='StartPage'>
                        <input type='hidden' name='command' value='ForgotPassword'>
                        <div class="form-group">
                            <label class="control-label" for="forgot-password-username">Please enter username:</label> 
                            <input required="required" type="text" class="form-control" id="forgot-password-username" name='fp-username'>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="forgot-password-email">Please enter signup email:</label> 
                            <input required="required" type="text" class="form-control" id="forgot-password-email" name='fp-email'>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="forgot-password-password">Please enter new password:</label> 
                            <input required="required" autocomplete="on" type="password" class="form-control" id="forgot-password-password" name='fp-password'>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <div class="form-group"> 
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>  
                </form>             
            </div>  
        </div>    
    </div>
        
        <script>
            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            signUpButton.addEventListener('click', () => {
	               container.classList.add("right-panel-active");
            });

            signInButton.addEventListener('click', () => {
	               container.classList.remove("right-panel-active");
            });
        </script>
    </body>
</html>