<?php
    if(empty($_POST['page'])){
        include('view_StartPage.php');
        exit();
    }

require('Model.php');
session_start();
    
    if($_POST['page'] == 'StartPage'){
        
        $command = $_POST['command'];
        switch($command){
                
            case 'LogIn':
                if(!check_user_account($_POST['login-username'], $_POST['login-password'])){
                    
                    $error_username_login = '* Wrong username, or';
                    $error_password_login = '* Wrong password';
                    
                    include('view_StartPage.php');
                }
                else{
                    $_SESSION['username'] = $_POST['login-username'];
                    
                    include('view_HomePage.php');
                }
                exit();
                break;
                
            case 'SignUp':
                if(check_user_existence($_POST['signup-username'])){
                    $error_username_signup = '* Username exists';
                    
                    include('view_StartPage.php');
                }
                else if (!make_new_account($_POST['signup-username'], $_POST['signup-password'], $_POST['signup-email'])){
                    $error_username_signup = '* DB access error';
                    $error_password_signup = '';
                    
                    include('view_StartPage.php');
                }
                else{
                    $_SESSION['username'] = $_POST['signup-username'];
                    include('view_AboutMe.php');
                }
                exit();
                break;
            case 'ForgotPassword':
                    forgotpassword($_POST['fp-username'], $_POST['fp-email'], $_POST['fp-password']);
                include('view_StartPage.php');
                exit();
                break;
            default:
                echo 'Unknown command from startpage <br>';
                exit();
                break;
            
        }
    }
/*Nav Commands*/
    elseif($_POST['page'] == 'navbar'){
    if($_POST['command'] == 'HomePage'){
        include('view_HomePage.php');
    }
    elseif($_POST['command'] == 'AppointmentPage'){
        
        include('view_Appointment.php');
    }
    elseif($_POST['command'] == 'ShoppingPage'){
        include('view_Shopping.php');
    }
    elseif($_POST['command'] == 'FeedbackPage'){
        include('view_Feedback.php');
    }
    elseif($_POST['command'] == 'PhotosPage'){
        include('view_Photos.php');
    }
    elseif($_POST['command'] == 'AboutYou'){
        //show user_details
        include('view_AboutMe.php');
    }
        elseif($_POST['command'] == 'AboutuserDetails'){
            $user_details = fetch_user_details($_SESSION['username']);
        echo json_encode($user_details);
        }
    elseif($_POST['command'] == 'logout'){
        session_unset();
        session_destroy();
        $_SESSION = [];
        include('view_StartPage.php');
    }
    else{
        echo 'Unknown command from navbar<br>';
    }
}
/*Appointment page*/
    elseif($_POST['page'] == "Appointment"){
        $command = $_POST['command'];
        $contact_no = fetch_user_contact($_SESSION['username']);
            foreach($contact_no as $v){
                foreach($v as $x){
                    $_SESSION['contact'] = $x;
                }
            }
        if($command == "book-appointment"){
            if(make_an_appointment($_SESSION['username'], $_POST['fullname'], $_POST['apptType'],$_SESSION['contact'],$_POST['date'], $_POST['time'])){
                include("view_Appointment.php");
            }else{
                echo 'Data not inserted';
            }
        }
        elseif($command == 'show-appointment'){
            $listappointment = get_appointment_list($_SESSION['username'], $_SESSION['contact']);
                echo json_encode($listappointment);
        }
        elseif($command == "delete-appointment"){
            delete_appointment($_POST['appointment_id']);
            echo "console.log('deleted');";
        }
        else{
            echo "wrong command from appointment page";
        }
    }
/*Shopping page*/

elseif($_POST['page'] == 'ShoppingPage'){
    $command = $_POST['command'];
    
    if($command == 'show-products'){
        $productList = showProducts();
        echo json_encode($productList);
    }elseif($command == 'add-to-cart'){
        if(addtoCart($_SESSION['username'], $_POST['product_id'])){
            echo "data inserted";
        }else{
            echo 'data not inserted';
        }
    }elseif($command == "emptyCart"){
        emptyCart($_SESSION['username']);
        echo 'Your cart is empty';
    }
    elseif($command == 'show-my-cart'){
        $myproductlist = showmyCart($_SESSION['username']);
        if(empty($myproductlist)){
            echo 'Your cart is empty';
        }else{
            echo json_encode($myproductlist);
        }
    }
    elseif($command == "removefromcart"){
        removefromcart($_SESSION["username"], $_POST['product_id']);
    }
    elseif($command == "makepayment"){
        $paymentdetails = userpayment($_SESSION['username']);
            echo json_encode($paymentdetails);
    }
    else{
        echo "wrong command in shopping page";
    }
}

/*feedback page*/
elseif($_POST['page'] == 'FeedbackPage'){
    $command = $_POST['command'];
    if($command == 'give-feedback'){
        if(insert_feedback($_SESSION['username'], $_POST['feedback_name'], $_POST['feedback_message'])){
            echo 'console.log(Method access);';
            include('view_Feedback.php');
        }else{
            echo 'Data not inserted to feedback table';
        }
    }
    elseif($command == 'get-feedback'){
        //get feebacks of everyone have given
        $feedbackreplies = get_feedbacks();
        //console.log()
        echo json_encode($feedbackreplies);
    }
}
/*photos page*/
elseif($_POST['page'] == 'photos-page'){
    $command = $_POST['command'];
    //how to call an api in php
    /*if($command == 'getPhotos'){
        $ch = curl_init();
        $url = "https://pixabay.com/api/?key=20657540-d2a9a089d8bd13a58f416baa8&q=".$_POST['search_term']."&image_type=photo&per_page=50";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $resp = curl_exec($ch);
        if($e = curl_exec($ch)){
            echo $e;
        }
        else{
            echo $resp; //returns images in json format
        }
    }*/
}

/*about page*/
elseif($_POST['page'] == 'AboutmePage'){
    if($_POST['command'] == 'userdetails'){
       // echo $_SESSION['username'];
        //make nav-links enable;
        if(insert_user_details($_SESSION['username'], $_POST['user_fullname'], $_POST['user_dob'], $_POST['gridRadios'], $_POST['user_email'], $_POST['user_contact'], $_POST['user_address'])){
            $_SESSION['user_contact'] = $_POST['user_contact'];
        
        include('view_HomePage.php');}
        else{
            echo 'data not inserted';
        }
    }
    else if($_POST['command'] == 'DeleteProfile'){
        delete_user_profile($_SESSION['username']);
        include('view_StartPage.php');
    }
    else{
        echo 'Wrong command <br>';
    }
}
else{
    echo 'Wrong Page <br>';
}

/* display user details on form */
?>